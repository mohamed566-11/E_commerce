<?php

namespace App\Models;

use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class product extends Model
{
    use HasFactory;
    use HasTranslations;


    protected $table = 'products';


    protected $fillable = [
        'category_id',
        'name',
        'slug',
        'short_description',
        'description',
        'price',
        'selling_price',
        'image',
        'qty',
        'tax',
        'status',
        'trend',
        'meta_title',
        'meta_keywords',
        'meta_description',
    ];

    public $translatable = ['name','short_description','description','meta_description'];


    public function category(){
        return $this->belongsTo(Category::class,'category_id','id');
    }
    public function user(){
        return $this->belongsTo(User::class,'user_id','id');
    }
    public function order(){
        return $this->belongsTo(Order::class,'order_id','id');
    }

    public function reviews(){
        return $this->hasMany(product_review::class, 'product_id', 'id')
                    ->where('is_approved', 1);
                    // ->paginate(10);
    }
    public function paginatedReviews($perPage = 10) {
        return $this->reviews()->paginate($perPage);
    }
    public function averageRating() {
        return max(3, round($this->reviews()
                    ->where('is_approved', 1)
                    ->avg('rating')));
    }



    public function orderItems() {
        return $this->hasMany(Order_items::class, 'product_id'); // تأكد من وجود المفتاح الصحيح
    }

    //طريقه اخري لاضافه التعليق علي المنتج
    // public function canReviewProduct($user_id, $product_id) {
    //     // تحقق مما إذا كان المستخدم قد اشترى المنتج
    //     $hasPurchased = Order::where('user_id', $user_id)
    //                         ->whereHas('items', function ($query) use ($product_id) {
    //                             $query->where('product_id', $product_id);
    //                         })
    //                         ->exists();
    //     return $hasPurchased;
    // }

    public function canReviewProduct($user_id, $product_id) {
        return DB::table('orders')
                ->join('order_items', 'orders.id', '=', 'order_items.order_id')
                ->where('orders.user_id', $user_id)
                ->where('order_items.product_id', $product_id)
                ->exists();
    }

    // public function getTopSellingProducts($limit = 8) {
    //     return DB::table('products')
    //         ->join('order_items', 'products.id', '=', 'order_items.product_id')
    //         ->select('products.*', DB::raw('SUM(order_items.quantity) as total_sold'))
    //         ->groupBy('products.id')
    //         ->orderByDesc('total_sold')
    //         ->limit($limit)
    //         ->get();
    // }
    // public function getTopSellingProducts($limit = 10) {
    //     return Product::withSum('items', 'quantity')
    //         ->orderByDesc('order_items_sum_quantity')
    //         ->limit($limit)
    //         ->get();
    // }



}
