@extends('layouts.admin')

@section('content')
    <div class="row">
        <div class="col-md-12">
            @if (session('message'))
                <h6 class="alert alert-success">{{ session('message') }}</h6>
            @endif
            <div class="card">
                <div class="card-header">
                    <h3>Edit Product
                        <a href="{{ url('admin/products') }}" class="btn btn-danger float-end btn-sm text-white">BACK</a>
                    </h3>
                </div>

                <div class="card-body">
                    @if ($errors->any())
                        <div class="alert alert-warning">
                            @foreach ($errors->all() as $error)
                                <div>{{ $error }}</div>
                            @endforeach
                        </div>
                    @endif

                    <form action="{{ url('admin/products/' . $product->id) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')

                        <div class="form-group row">
                            <ul class="nav nav-tabs" id="myTab" role="tablist">
                                <li class="nav-item" role="presentation">
                                    <button class="nav-link active" id="home-tab" data-bs-toggle="tab"
                                        data-bs-target="#home-tab-pane" type="button" role="tab"
                                        aria-controls="home-tab-pane" aria-selected="true">Home</button>
                                </li>
                                <li class="nav-item" role="presentation">
                                    <button class="nav-link" id="seotag" data-bs-toggle="tab"
                                        data-bs-target="#seotag-pane" type="button" role="tab"
                                        aria-controls="seotag-pane" aria-selected="false">Seo Tags</button>
                                </li>
                                <li class="nav-item" role="presentation">
                                    <button class="nav-link" id="details-tab" data-bs-toggle="tab"
                                        data-bs-target="#details-tab-pane" type="button" role="tab"
                                        aria-controls="details-tab-pane" aria-selected="false">Details</button>
                                </li>
                                <li class="nav-item" role="presentation">
                                    <button class="nav-link" id="image-tab" data-bs-toggle="tab"
                                        data-bs-target="#image-tab-pane" type="button" role="tab"
                                        aria-controls="image-tab-pane" aria-selected="false">Product Image</button>
                                </li>
                                <li class="nav-item" role="presentation">
                                    <button class="nav-link" id="color-tab" data-bs-toggle="tab"
                                        data-bs-target="#color-tab-pane" type="button" role="tab"
                                        aria-controls="image-tab-pane" aria-selected="false">Product Color</button>
                                </li>

                            </ul>
                            <div class="tab-content" id="myTabContent">
                                <div class="tab-pane border p-3 fade show active" id="home-tab-pane" role="tabpanel"
                                    aria-labelledby="home-tab" tabindex="0">
                                    <div class="mb-3 mt-3">
                                        <label class="mb-2">Category</label>
                                        <select name="category_id" class="form-control ">
                                            @foreach ($categories as $category)
                                                <option value="{{ $category->id }}"
                                                    {{ $category->id == $product->category_id ? 'selected' : '' }}>
                                                    {{ $category->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="mb-3">
                                        <label for="">Product Name</label>
                                        <input type="text" name="name" value="{{ $product->name }}"
                                            class="form-control">
                                    </div>
                                    <div class="mb-3">
                                        <label for="">Product Slug</label>
                                        <input type="text" name="slug" value="{{ $product->slug }}"
                                            class="form-control">
                                    </div>
                                    <div class="mb-3">
                                        <label>Select Brand</label>
                                        <select name="brand_id" class="form-control">
                                            @foreach ($brands as $brand)
                                                <option value="{{ $brand->name }}"
                                                    {{ $brand->name == $product->brand ? 'selected' : '' }}>
                                                    {{ $brand->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="mb-3">
                                        <label for="">Small Description (500words)</label>
                                        <textarea name="small_description" class="form-control" rows="4">{{ $product->small_description }}</textarea>
                                    </div>
                                    <div class="mb-3">
                                        <label for="">Description </label>
                                        <textarea name="description" class="form-control" rows="4">{{ $product->description }}</textarea>
                                    </div>

                                </div>
                                <div class="tab-pane border p-3 fade" id="seotag-pane" role="tabpanel"
                                    aria-labelledby="seotag" tabindex="0">
                                    <div class="mb-3">
                                        <label for="">Meta Title</label>
                                        <input type="text" name="meta_title" value="{{ $product->meta_title }}"
                                            class="form-control">
                                    </div>
                                    <div class="mb-3">
                                        <label for="">Meta Description</label>
                                        <textarea name="meta_description" class="form-control" rows="4">{{ $product->meta_description }}</textarea>
                                    </div>
                                    <div class="mb-3">
                                        <label for="">Meta Keyword</label>
                                        <textarea name="meta_keyword" class="form-control" rows="4">{{ $product->meta_keyword }}</textarea>
                                    </div>

                                </div>
                                <div class="tab-pane border p-3 fade" id="details-tab-pane" role="tabpanel"
                                    aria-labelledby="details-tab" tabindex="0">
                                    <div class="row">
                                        <div class="col-md-4">
                                            <div class="mb-3">
                                                <label for="">Original Price</label>
                                                <input type="text" name="original_price"
                                                    value="{{ $product->original_price }}" class="form-control">
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="mb-3">
                                                <label for="">Selling Price</label>
                                                <input type="text" name="selling_price"
                                                    value="{{ $product->original_price }}" class="form-control">
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="mb-3">
                                                <label for="">Quantity</label>
                                                <input type="text" name="quantity" value="{{ $product->quantity }}"
                                                    class="form-control">
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="mb-3">
                                                <div class="form-check">
                                                    <label class="form-check-label">
                                                        <input type="checkbox" class="form-check-input"
                                                            {{ $product->trending == 1 ? 'checked' : '' }}
                                                            name="trending">
                                                        Trending
                                                    </label>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="mb-3">
                                                <div class="form-check">
                                                    <label class="form-check-label">
                                                        <input type="checkbox" class="form-check-input"   {{ $product->featured == 1 ? 'checked' : '' }} name="featured">
                                                        Featured
                                                    </label>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="mb-3">
                                                <div class="form-check">
                                                    <label class="form-check-label">
                                                        <input type="checkbox" class="form-check-input"
                                                            {{ $product->status == 1 ? 'checked' : '' }} name="status">
                                                        Status
                                                    </label>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="tab-pane border p-3 fade" id="image-tab-pane" role="tabpanel"
                                    aria-labelledby="image-tab" tabindex="0">
                                    <div class="mb-3">
                                        <label for="">Upload Product Images</label>
                                        <input type="file" multiple name="image[]" class="form-control">
                                    </div>
                                    <div>
                                        @if ($product->productImages)
                                            <div class="row">
                                                @foreach ($product->productImages as $image)
                                                    <div class="col-md-2">
                                                        <img src="{{ asset($image->image) }}"
                                                            style="width: 80px; height: 80px;" alt=""
                                                            class="me-4 border">
                                                        <a href="{{ url('admin/product-image/' . $image->id . '/delete') }}"
                                                            class="d-block">Remove</a>
                                                    </div>
                                                @endforeach
                                            </div>
                                        @else
                                            <h5>No Image Uploaded</h5>
                                        @endif
                                    </div>
                                </div>
                                <div class="tab-pane border p-3 fade" id="color-tab-pane" role="tabpanel"
                                    aria-labelledby="image-tab" tabindex="0">
                                    <div class="mb-3">
                                        <label for="">Edit Product Color</label>
                                        <hr />
                                        <div class="row">
                                            @forelse ($colors as $color)
                                                <div class="col-md-3">
                                                    <div class="p-2 border mb-5">
                                                        Color: <input type="checkbox" name="colors[{{ $color->id }}]"
                                                            value="{{ $color->id }}" /> {{ $color->name }}
                                                        <br />
                                                        Quantity: <input type="number"
                                                            name="colorquantity[{{ $color->id }}]"
                                                            style="border:1px solid ; width:70px;" />
                                                    </div>
                                                </div>
                                            @empty
                                                <div class="col-md-12">
                                                    <h4>No Colors Found</h4>
                                                </div>
                                            @endforelse
                                        </div>

                                    </div>
                                    <div class="table-responsive">
                                        <table class="table table-sm table-bordered">
                                            <thead>
                                                <tr>
                                                    <th>Color Name</th>
                                                    <th>Quantity</th>
                                                    <th>Delete</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach ($product->productColors as $prodColor)
                                                    <tr class="prod-color-tr">

                                                        @if ($prodColor->color)
                                                            <td> {{ $prodColor->color->name }} </td>
                                                        @else
                                                            <td>No Color Available</td>
                                                        @endif
                                                        <td>
                                                            <div class="input-group mb-3" style="width: 150px">
                                                                <input type="text" value="{{ $prodColor->quantity }}"
                                                                    class="productColorQuantity form-control form-control-sm">
                                                                <button type="button" value="{{ $prodColor->id }}"
                                                                    class="updateProductColorBtn btn btn-primary btn-small text-white">Update</button>
                                                            </div>
                                                        </td>
                                                        <td>
                                                            <button type="button" value="{{ $prodColor->id }}"
                                                                class="deleteProductColorBtn btn btn-danger btn-small text-white">Delete</button>
                                                        </td>
                                                    </tr>
                                                @endforeach

                                            </tbody>
                                        </table>

                                    </div>
                                </div>
                            </div>
                        </div>
                </div>
                <div class="mx-auto">
                    <button type="submit" class="btn btn-primary text-white ">Update</button>
                </div>
                </form>
            </div>
        </div>
    </div>
    </div>
@endsection


@section('scripts')
<script>
    $(document).ready(function(){
        $.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
    });
        $(document).on('click','.updateProductColorBtn', function(){
            var product_id = "{{$product->id}}";
            var prod_color_id = $(this).val();
            var qty = $(this).closest('.prod-color-tr').find('.productColorQuantity').val();
           

            if(qty <= 0)
            {
                alert('Quantity is required');
                return false;
            }

            var data = {
                'product_id':product_id,
               
                'qty':qty,
            };

            $.ajax({
                type:"POST",
                url: '/admin/product-color/'+prod_color_id,
                data : data,
                success:function(response){
                    alert(response.message);
                }
                    
            });
        });

        $(document).on('click','.deleteProductColorBtn', function(){
            var prod_color_id = $(this).val();
            var thisClick = $(this);

            $.ajax({
                type:"GET",
                url: "/admin/product-color/"+prod_color_id+"/delete",
                success:function(response){
                    thisClick.closest('.prod-color-tr').remove();
                    alert(response.message);
                    
                }
                    
            });

        });
        
    });
</script>

@endsection
