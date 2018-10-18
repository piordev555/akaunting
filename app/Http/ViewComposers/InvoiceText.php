<?php

namespace App\Http\ViewComposers;

use Illuminate\View\View;

class InvoiceText
{

    /**
     * Bind data to the view.
     *
     * @param  View  $view
     * @return void
     */
    public function compose(View $view)
    {
        $text_override = [
            'items' => trans_choice('general.items', 2),
            'quantity' => trans('invoices.quantity'),
            'price' => trans('invoices.price'),
        ];

        $text_items = setting('general.invoice_item');

        if ($text_items == 'custom') {
            $text_items = setting('general.invoice_item_input');
        }

        $text_quantity = setting('general.invoice_quantity');

        if ($text_quantity == 'custom') {
            $text_quantity = setting('general.invoice_quantity_input');
        }

        $text_price = setting('general.invoice_price');

        if ($text_price == 'custom') {
            $text_price = setting('general.invoice_price_input');
        }

        $text_override['items'] = $text_items;
        $text_override['quantity'] = $text_quantity;
        $text_override['price'] = $text_price;

        $view->with(['text_override' => $text_override]);
    }

}