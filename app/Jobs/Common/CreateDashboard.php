<?php

namespace App\Jobs\Common;

use App\Abstracts\Job;
use App\Models\Auth\User;
use App\Models\Common\Dashboard;
use App\Models\Common\Widget;
use App\Utilities\Widgets;
use Illuminate\Support\Arr;

class CreateDashboard extends Job
{
    protected $dashboard;

    protected $request;

    /**
     * Create a new job instance.
     *
     * @param  $request
     */
    public function __construct($request)
    {
        $this->request = $this->getRequestInstance($request);
    }

    /**
     * Execute the job.
     *
     * @return Item
     */
    public function handle()
    {
        $this->request['enabled'] = $this->request['enabled'] ?? 1;

        \DB::transaction(function () {
            $users = $this->getUsers();

            if (empty($users)) {
                return;
            }

            $this->dashboard = Dashboard::create($this->request->only(['company_id', 'name', 'enabled']));

            $this->dashboard->users()->attach($users);

            $this->checkAndCreateWidgets();
        });

        return $this->dashboard;
    }

    protected function getUsers()
    {
        $list = [];

        if ($this->request->has('users')) {
            $user_ids = Arr::wrap($this->request->get('users'));

            foreach($user_ids as $user_id) {
                $user = User::find($user_id);

                if (!$this->shouldCreateDashboardFor($user)) {
                    continue;
                }

                $list[] = $user;
            }
        } else {
            $user = user();

            if ($this->shouldCreateDashboardFor($user)) {
                $list[] = $user;
            }
        }

        return $list;
    }

    protected function shouldCreateDashboardFor($user)
    {
        if (empty($user)) {
            return false;
        }

        // Don't create dashboard if user can't access admin panel (i.e. customer with login)
        if ($user->cannot('read-admin-panel')) {
            return false;
        }

        return true;
    }

    protected function checkAndCreateWidgets()
    {
        $sort = 1;

        if ($this->request->has('default_widgets')) {
            $widgets = Widgets::getClasses(false);

            $this->createWidgets($widgets, $sort);
        }

        if ($this->request->has('custom_widgets')) {
            $widgets = $this->request->get('custom_widgets');

            $this->createWidgets($widgets, $sort);
        }
    }

    protected function createWidgets($widgets, &$sort)
    {
        foreach ($widgets as $class => $name) {
            // It's just an array of classes
            if (is_numeric($class)) {
                $class = $name;
                $name = (new $class())->getDefaultName();
            }

            Widget::create([
                'company_id' => $this->dashboard->company_id,
                'dashboard_id' => $this->dashboard->id,
                'class' => $class,
                'name' => $name,
                'sort' => $sort,
                'settings' => (new $class())->getDefaultSettings(),
            ]);

            $sort++;
        }
    }
}
