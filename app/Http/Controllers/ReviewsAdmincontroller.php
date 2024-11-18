<?php

namespace App\Http\Controllers;

use App\Models\product_review;
use Illuminate\Http\Request;

class ReviewsAdmincontroller extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data['route']= 'reviews';
        $data['reviews']= product_review::orderBy('is_approved')->latest()->get();
        return view('dashboard.reviews.index',$data);
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
        //
    }

    /**
     * Display the specified resource.
     */
    public function show( $id)
    {
        $data['route'] = 'products';
        $data['reviews'] = product_review::where('product_id',$id)->get();
        // dd($data['reviews']);
        return view('dashboard.products.reviews',$data);
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
        $product_review = product_review::findOrFail($id);

        $product_review->update([
            'is_approved'=>$request->is_approved,
        ]);

        // dd($user);
        return redirect()->route('reviews_product.index')->with('success',trans("messages_trans.success_update"));

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $product_review = product_review::findOrFail($id);
        $product_review->delete();
        return redirect()->route('reviews_product.index')->with('success',trans("messages_trans.success_delete"));
    }
}
