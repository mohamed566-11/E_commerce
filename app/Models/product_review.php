<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class product_review extends Model
{
    use HasFactory;
    protected $table = 'product_reviews';
    protected $fillable = [
        'user_id','product_id','rating', 'review', 'is_approved'
    ];

    public function user()
    {
        return $this->belongsTo(User::class)->withDefault([
            'name' => 'Guest Customer'
        ]);
    }
    public function product()
    {
        return $this->belongsTo(product::class)->withDefault([
            'name' => 'Guest product'
        ]);
    }
}
