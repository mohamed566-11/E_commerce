<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\Pivot;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Order_items extends Pivot
{
    use HasFactory;
    protected $table = 'order_items';
    public $incrementing = true;

    public $timestamps = false;

    
    public function product()
    {
        return $this->belongsTo(product::class)->withDefault([
            'name' => $this->product_name
        ]);
    }

    public function order()
    {
        return $this->belongsTo(Order::class);
    }

}
