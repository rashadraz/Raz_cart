<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\ProductFormRequest;
use App\Models\Brand;
use App\Models\Category;
use Illuminate\Http\Request;
use illuminate\Support\Str;

class ProductController extends Controller
{
    public function index()
    {
        return view('admin.products.index');
    }
    public function create()
    {
        $brands = Brand::all();
        $categories = Category::all();
        return view('admin.products.create',compact('categories','brands'));
    }
    public function store(ProductFormRequest $request)
    {
        $valdiatedData = $request->validated();

        $category = Category::findOrFail($valdiatedData['category_id']);

        $product = $category->products()->create([
            'category_id' => $valdiatedData['category_id'],
            'name' => $valdiatedData['name'],
            'slug' => Str::slug($valdiatedData['slug']),
            'brand_id' => $valdiatedData['brand_id'],
            'small_description' => $valdiatedData['small_description'],
            'description' => $valdiatedData['description'],
            'original_price' => $valdiatedData['original_price'],
            'selling_price' => $valdiatedData['selling_price'],
            'quantity' => $valdiatedData['quantity'],
            'trending' => $request->trending == true ? 1 : 0,
            'status' => $request->status == true ? 1 : 0,
            'meta_title' => $valdiatedData['meta_title'],
            'meta_keyword' => $valdiatedData['meta_keyword'],
            'meta_description' => $valdiatedData['meta_description'],

           
        ]);

        if($request->hasFile('image')){
            $uploadPath = 'uploads/products/';

            $i=1;

            foreach($request->file('image') as $imageFile){
                $extention = $imageFile->getClientOriginalExtension();
                $filename = time().$i++.'.'.$extention;
                $imageFile->move($uploadPath,$filename);
                $finalImagePathName = $uploadPath.$filename;

                $product->productImages()->create([
                    'product_id'=>$product->id,
                    'image'=>$finalImagePathName,
                ]);
            }
        }
        return redirect('/admin/products')->with('message','Product Added Successfully');

       
    }
}
