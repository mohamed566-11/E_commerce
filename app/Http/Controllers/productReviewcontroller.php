<?php

namespace App\Http\Controllers;

use App\Models\product;
use App\Models\User;
use Illuminate\Http\Request;
use App\Models\product_review;
use Illuminate\Support\Facades\Auth;

class productReviewcontroller extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validate = $request->validate([
            'rating'=>'required|min:1|max:5',
            'review'=>'required|string'
        ]);
        
        $product_review = product_review::create([
            'user_id'=>Auth::user()->id,
            'product_id'=>$request->product_id, 
            'rating'=>$request->rating, 
            'review'=>$request->review, 
        ]);

        $product=product::findOrFail($request->product_id);
        return redirect()->route('get_product_slug',[
            'category_slug'=>$product->category->slug,
            'product_slug'=>$product->slug,
        ])->with('success','success add review');


    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
