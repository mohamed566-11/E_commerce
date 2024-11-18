<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class deliveryorder extends Model
{
    use HasFactory;
    protected $fillable = [
        'user_id','order_number','delivery_order_status','order_id'
    ];
    public function user()
    {
        return $this->belongsTo(User::class)->withDefault([
            'name' => 'Guest Customer'
        ]);
    }
}
