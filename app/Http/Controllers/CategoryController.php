<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Requests\Categoryrequest;
use Illuminate\Support\Facades\Storage;
use App\Http\Requests\updateCategoryRequest;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data['route']='categories';
        $data['categories'] = Category::select('id', 'name', 'image', 'is_showing', 'is_popular')->get();
        return view('dashboard.categories.index',$data);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $data['route']='categories';
        return view('dashboard.categories.create',$data);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {


        $validate = $request->validate([
            'name_ar'=>'required',
            'name_en'=>'required',
            'slug'=>'required',
            'description_ar'=>'required',
            'description_en'=>'required',
            'image'=>'required|image',
            'meta_title_ar'=>'required',
            'meta_title_en'=>'required',
            'meta_description_ar'=>'required',
            'meta_description_en'=>'required',
            'meta_keywords'=>'required'
            ]);
        try {


            $image = $request->file('image');
            $image_name = $image->getClientOriginalName();

            $path = $request->file('image')
            ->storeAs($request->name_en,$image_name,'public_uploads');

            $category = new Category();
            $category->name = ['ar'=>$request->name_ar,'en'=>$request->name_en];
            $category->slug = $request->slug;
            $category->description = ['ar'=>$request->description_ar,'en'=>$request->description_en];
            $category->is_showing = $request->is_showing ? '1' : '0';
            $category->is_popular = $request->is_popular ? '1' : '0';
            $category->meta_title = ['ar'=>$request->meta_title_ar,'en'=>$request->meta_title_en];
            $category->meta_description = ['ar'=>$request->meta_description_ar,'en'=>$request->meta_description_en];
            $category->meta_keywords = $request->meta_keywords;
            $category->image = $path;
            $category->save();


            flash()->success(trans("messages_trans.success_save"), 'Congrats', ['timeOut' => 5000]);
            return redirect()->route('categories.index');

        } catch (\Exception $e) {

            return redirect()->back()->withErrors('error_catch',$e->getMessage());
        }
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $data['route']='categories';
        $data['category']=Category::findOrFail($id);
        return view('dashboard.categories.show',$data);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $data['route']='categories';
        $data['category']=Category::findOrFail($id);
        return view('dashboard.categories.edit',$data);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(updateCategoryRequest $request, Category $category)
    {

        try {

            $validated = $request->validated();

            $image = $category->image;

            if ($request->hasFile('image')) {
                Storage::disk('public_uploads')
                ->deleteDirectory($request->name_en);
                $path = $request->file('image')
                ->storeAs('',$image,'public_uploads');
            }

            $category->update([
                'name' => ['ar' => $request->name_ar, 'en' => $request->name_en],
                'slug' => $request->slug,
                'description' => ['ar' => $request->description_ar, 'en' => $request->description_en],
                'is_showing' => $request->is_showing ? '1' : '0',
                'is_popular' => $request->is_popular ? '1' : '0',
                'meta_title' => ['ar' => $request->meta_title_ar, 'en' =>$request->meta_title_en],
                'meta_description' => ['ar' => $request->meta_description_ar, 'en' => $request->meta_description_en],
                'meta_keywords' => $request->meta_keywords,
                'image' => $image,

            ]);
            return redirect()->route('categories.index')->with('success',trans("messages_trans.success_update"));

        } catch (\Exception $e) {
            return redirect()->back()->withErrors('error', $e->getMessage());

        }

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request)
    {
        $category = Category::findOrFail($request->id);
        $name_en = $category->getTranslation('name','en');
        Storage::disk('public_uploads')
        ->deleteDirectory($name_en);
        $category->delete();
        return redirect()->route('categories.index')->with('success',trans("messages_trans.success_delete"));
    }
}
