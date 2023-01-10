<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\ProductFormRequest;
use App\Models\Brand;
use App\Models\Category;
use App\Models\Product;
use App\Models\ProductImage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use illuminate\Support\Str;

class ProductController extends Controller
{
    public function index()
    {
        $products = Product::all();
        return view('admin.products.index',compact('products'));
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
    public function edit( int $product)
    {
        $product = Product::findOrFail($product);
        $brands = Brand::all();
        $categories = Category::all();
        return view('admin.products.edit',compact('product','categories','brands'));
    }
    public function update(ProductFormRequest $request, int $product_id)
    {
        $valdiatedData = $request->validated();
        $product = Category::findOrFail($valdiatedData['category_id'])
        ->products()->where('id',$product_id)->first();
        if($product)
        {
            $product->update([
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
        else
        {
            return redirect('/admin/products')->with('message','Product not found');
        }
    }
    public function destroyImage(int $product_image_id)
    {
        $productImage = ProductImage::findOrFail($product_image_id);
        if(File::exists($productImage->image)){
            File::delete($productImage->image);
        }
        $productImage->delete();
        return redirect()->back()->with('message','Image Deleted Successfully');
    }


    public function destroy(int $product_id)
    {
        $product = Product::findOrFail($product_id);
        if($product->productImages())
        {
            foreach($product->productImages as $image)
            {
                if(File::exists($image->image))
                {
                    File::delete($image->image);
                }
            }
        }
        $product->delete();
        return redirect('/admin/products')->with('message','Product Deleted Successfully');
    }
   

    
    
}
