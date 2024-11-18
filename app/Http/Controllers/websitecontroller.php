<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\product;
use Illuminate\Http\Request;

class websitecontroller extends Controller
{

    // public function getTopSellingProducts($limit = 10) {
    //     return Product::withSum('orderItems', 'quantity')
    //         ->orderByDesc('order_items_sum_quantity')
    //         ->limit($limit)
    //         ->get();
    // }
    public function index(){
        $data['route']='home';
        $data['route_products']='products';
        $data['route_categorys']='categories';
        $data['products']= product::all();

        $data['TopSellingProducts']= Product::withSum('orderItems', 'quantity')
        ->orderByDesc('order_items_sum_quantity')
        ->limit(8)
        ->get();

        $data['TopSellingProduct'] = Product::withSum('orderItems', 'quantity')
        ->orderByDesc('order_items_sum_quantity')
        ->limit(1)
        ->first();


        $data['categories']= Category::all();
        $data['featured_categories']= Category::where('is_popular',1)->get();
        $data['trend_products']= product::with('category')->where('trend',1)->get();
        $data['latest_products']= product::with('category')->latest()->limit(8)->get();
        return view('website.home',$data);
    }

    public function getCategories(){
        $data['route']='categories';
        $data['categories'] = Category::where('is_showing',1)->get();
        return view('website.categories',$data);
    }
    public function getproducts(){
        $data['route']='products';
        $data['products'] = product::where( 'status',1)->get();
        // $data['reviews'] = product::where( 'product_id',1)->get();
        return view('website.all_products',$data);
    }
    public function getCategoryBySlug($slug){

        if (Category::where('slug',$slug)->exists()){
            $data['route']='categories';
            $data['route_product']='products';
            $data['category'] = Category::with('products')->where('slug',$slug)->where('is_showing',1)->first();
            return view('website.category',$data);

        }else{
            return redirect('/')->with('error','there is wrong slug');
        }

    }

public function getProductBySlug($category_slug , $product_slug){

        if (Category::where('slug',$category_slug)->exists()){

            if (Product::where('slug',$product_slug)->exists()){
                $data['route']='categories';
                $data['route_product']='products';
                $data['product'] = Product::with('category')->where('slug',$product_slug)->first();
                $data['keywords'] = explode(',', $data['product']->meta_keywords);
                return view('website.product',$data);

            }else{
                return redirect('/')->with('error','there is no product');
            }

        }else{
            return redirect('/')->with('error','there is no category');
        }

    }

}
