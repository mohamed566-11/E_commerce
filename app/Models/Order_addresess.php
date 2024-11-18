<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order_addresess extends Model
{
    use HasFactory;
    protected $table = 'order_addresses';
    protected $fillable = [
        'order_id', 'fname', 'lname', 'email', 'phone',
        'address1', 'address2', 'city', 'country', 'pincode',
    ];
    public function order()
    {
        return $this->belongsTo(Order::class);
    }

}
