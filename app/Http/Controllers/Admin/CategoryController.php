<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\CategoryFormRequest;
use App\Models\Category;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\File ;
use illuminate\Support\Str;
use Illuminate\Support\Facades\Input;

class CategoryController
{
    public function index()
    {
        return view('admin.category.index');
    }
    public function create()
    {
        return view('admin.category.create');
    }
    public function store(CategoryFormRequest $request)
    {
        $validatedData = $request->validated();
        $category = new Category;
        $category->name = $validatedData['name'];
        $category->slug = Str::slug($validatedData['slug']);
        $category->description = $validatedData['description'];
        $category->meta_title = $validatedData['meta_title'];
        $category->meta_keyword = $validatedData['meta_keyword'];
        $category->meta_description = $validatedData['meta_description'];
        $category->status = $request->status == true ? 1 : 0;
        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $ext = $file->getClientOriginalExtension();
            $filename = time().'.'.$ext;
            $file->move('uploads/categories/',$filename);
            $category->image =  $filename;
        }
       
       
        $category->save();

        return redirect('admin/category')->with('message','Category Added Successfully');
    }

    public function edit(Category $category) 
    {
        return view('admin.category.edit',compact('category')); 
    }

    public function update(CategoryFormRequest $request,$category)
    {
        $category = Category::findOrFail($category);

        $validatedData = $request->validated();

        $category->name = $validatedData['name'];
        $category->slug = Str::slug($validatedData['slug']);
        $category->description = $validatedData['description'];
        $category->meta_title = $validatedData['meta_title'];
        $category->meta_keyword = $validatedData['meta_keyword'];
        $category->meta_description = $validatedData['meta_description'];
        $category->status = $request == true ? 1 : 0;
        if ($request->hasFile('image')) {
            $path = 'uploads/categories/'.$category->image;
            if(File::exists($path)){
                File::delete($path);
            }
            $file = $request->file('image');
            $ext = $file->getClientOriginalExtension();
            $filename = time().'.'.$ext;
            $file->move('uploads/categories/',$filename);
            $category->image =  $filename;
        }
       
       
        $category->save();

        return redirect('admin/category')->with('message','Category Updated Successfully');
    }

  

}
