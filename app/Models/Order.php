<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Order extends Model
{
    use HasFactory, Notifiable;
    protected $table = 'orders';
    protected $fillable = [
        'user_id','number','total', 'payment_method', 'status', 'payment_status',
    ];

    public function user()
    {
        return $this->belongsTo(User::class)->withDefault([
            'name' => 'Guest Customer'
        ]);
    }

    public function products()
    {
        return $this->belongsToMany(Product::class, 'order_items', 'order_id', 'product_id', 'id', 'id')
            ->using(Order_items::class)
            ->as('order_item')
            ->withPivot([
                'product_name', 'price', 'quantity', 'options',
            ]);
    }

    public function items()
    {
        return $this->hasMany(Order_items::class, 'order_id');
    }
    public function tracks()
    {
        return $this->hasMany(OrderTrack::class, 'order_id');
    }
    public function deliveryorder()
    {
        return $this->hasOne(deliveryorder::class);
    }

    // public function addresses()
    // {
    //     return $this->hasMany(Order_addresess::class);
    // }



}
