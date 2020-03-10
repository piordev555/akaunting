<div class="table-responsive overflow-auto mt-4">
    <table class="table table-hover align-items-center rp-border-collapse">
        <thead class="border-top-style">
            <tr class="row rp-border-bottom-1 font-size-unset px-3">
                <th class="{{ $class->column_name_width }} text-right px-0 border-top-0"></th>
                @foreach($class->dates as $date)
                    <th class="{{ $class->column_value_width }} text-right px-0 border-top-0">{{ $date }}</th>
                @endforeach
                <th class="{{ $class->column_name_width }} text-uppercase text-right border-top-0">
                    {{ trans_choice('general.totals', 1) }}
                </th>
            </tr>
        </thead>
    </table>
</div>
