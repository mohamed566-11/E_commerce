<?php

namespace App\Http\Controllers;

use App\Models\product;
use App\Models\Category;
use Illuminate\Support\Facades\Storage;
use App\Http\Requests\StoreproductRequest;
use App\Http\Requests\UpdateproductRequest;
use Illuminate\Support\Facades\Request;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data['route']='products';
        $data['products']= product::all();
        return view('dashboard.products.index',$data);

    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $data['route']='products';
        $data['categories']= Category::all();
        return view('dashboard.products.create',$data);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreproductRequest $request)
    {
        try {
            $validate = $request->validated();

            $image = $request->file('image');
            $image_name = $image->getClientOriginalName();
            $path = $image->storeAs($request->name_en,$image_name,'public_uploads_products');

            $product = new product();
            $product->category_id = $request->category_id;
            $product->name = ['ar'=>$request->name_ar,'en'=>$request->name_en];
            $product->description = ['ar'=>$request->description_ar,'en'=>$request->description_en];
            $product->short_description = ['ar'=>$request->short_description_ar,'en'=>$request->short_description_en];
            $product->meta_description = ['ar'=>$request->meta_description_ar,'en'=>$request->meta_description_en];
            $product->slug = $request->slug;
            $product->price = $request->price;
            $product->selling_price = $request->selling_price;
            $product->image = $path;
            $product->qty = $request->qty;
            $product->tax = $request->tax;
            $product->status = $request->status ? '1' : '0';
            $product->trend = $request->trend ? '1' : '0';
            $product->meta_title = $request->meta_title;
            $product->meta_keywords = $request->meta_keywords;
            $product->save();

            return redirect()->route('products.index')->with('success',trans('messages_trans.success_save'));

        } catch (\Exception $e) {
            return redirect()->back()->with(['error_catch' => $e->getMessage()]);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $data['route']='products';
        $data['categories']= Category::all();
        $data['product'] = product::findOrFail($id);
        return view("dashboard.products.show",$data);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $data['route']='products';
        $data['categories']= Category::all();
        $data['product'] = product::findOrFail($id);
        return view("dashboard.products.edit",$data);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateproductRequest $request,product $product)
    {
        try {

            $validated = $request->validated();

            $image = $product->image;
            // dd($image);

            if ($request->hasFile('image')) {
                Storage::disk('public_uploads_products')
                ->deleteDirectory($request->name_en);
                $path = $request->file('image')
                ->storeAs('',$image,'public_uploads_products');
            }

            $product->update([
            'category_id'=>$request->category_id,
            'name'=>['ar' => $request->name_ar, 'en' => $request->name_en],
            'slug'=>$request->slug,
            'short_description'=>['ar' => $request->short_description_ar, 'en' => $request->short_description_en],
            'description'=>['ar' => $request->description_ar, 'en' => $request->description_en],
            'status'=>$request->status ? '1' : '0',
            'trend'=>$request->trend ? '1' : '0',
            'price'=>$request->price,
            'selling_price'=>$request->selling_price,
            'qty'=>$request->qty,
            'tax'=>$request->tax,
            'meta_title'=>$request->meta_title,
            'meta_description'=>['ar' => $request->meta_description_ar, 'en' => $request->meta_description_en],
            'meta_keywords'=>$request->meta_keywords,
            'image'=>$image,
            ]);
            return redirect()->route('products.index')->with('success',trans("messages_trans.success_update"));

        } catch (\Exception $e) {
            return redirect()->back()->withErrors('error', $e->getMessage());

        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $product = product::findOrFail($id);
        $name_en = $product->getTranslation('name','en');
        Storage::disk('public_uploads_products')
        ->deleteDirectory($name_en);
        $product->delete();
        return redirect()->route('products.index')->with('success',trans("messages_trans.success_delete"));
    }
}
