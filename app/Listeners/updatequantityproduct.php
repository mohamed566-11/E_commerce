<?php

namespace App\Listeners;

use App\Events\quantityproduct;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class updatequantityproduct
{
    /**
     * Create the event listener.
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     */
    public function handle(quantityproduct $event): void
    {
        $order = $event->order;
        if ($order->status === "completed") {
            foreach ($order->products as $product) {
                $product->qty-=$product->order_item->quantity;
                $product->update([
                    'qty'=>$product->qty
                ]);
                
            }
        }
        //طريقه اخري
        // if ($order->status === "completed") {
        //     foreach ($order->items as $item) {
        //         $item->product->qty-=$item->quantity;
        //         $item->product->update([
        //             'qty'=>$item->product->qty
        //         ]);
        //         // dd($item->quantity);
        //     }
        // }


    }
}
