@extends('layouts.admin')

@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h3>Edit Category
                        <a href="{{ url('admin/category') }}"
                            class="btn btn-primary float-end btn-sm text-white">Back</a>
                    </h3>
                </div>
                <div class="card-body">
                    <form action="{{ url('admin/category/'.$category->id) }}" method="POST" enctype="multipart/form-data">
                        @method('PUT')
                        @csrf
                        

                        <div class="row">
                            <div class="mb-3 col-md-6">
                                <label>Name</label>
                                <input type="text" class="form-control mt-2" value="{{$category->name}}" name="name">
                                @error('name')
                                    <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>
                            <div class="mb-3 col-md-6">
                                <label>Slug</label>
                                <input type="text" class="form-control mt-2" value="{{$category->slug}}" name="slug">
                                @error('slug')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                            </div>
                            <div class="mb-3 col-md-6">
                                <label>Description</label>
                                <input type="text" class="form-control mt-2" value="{{$category->description}}" name="description">
                                @error('description')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                            </div>
                            <div class="mb-3 col-md-6">
                                <label>Image</label>
                                <input type="file" class="form-control mt-2" name="image">
                                <img src="{{asset('uploads/categories/'.$category->image)}}" width="60px" height="60px"/>
                                @error('image')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                            </div>
                            <div class="col-md-12 ">
                                <h4>Seo Tags</h4>
                            </div>
                            <div class="mb-3 col-md-12 mt-2">
                                <label>Meta_title</label>
                                <input type="text" class="form-control mt-2" value="{{$category->meta_title}}" name="meta_title">
                                @error('meta_title')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                            </div>
                            <div class="mb-3 col-md-12">
                                <label>Meta_keyword</label>
                                <input type="text" class="form-control mt-2" value="{{$category->meta_keyword}}" name="meta_keyword">
                                @error('meta_keyword')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                            </div>
                            <div class="mb-3 col-md-12">
                                <label>Meta_description</label>
                                <input type="text" class="form-control mt-2" value="{{$category->meta_description}}" name="meta_description">
                                @error('meta_description')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                            </div>
                            <div>
                                <div class="form-check form-check-success">
                                    <label class="form-check-label ">
                                      <input type="checkbox" name="status" class=" mt-2 form-check-input" value="{{$category->status == 1 ? 'checked' : ''}}">
                                      Status
                                    </label>
                                    @error('status')
                                    <small class="text-danger">{{ $message }}</small>
                                @enderror
                                  </div>
                            </div>
                            <div class="mb-3 col-md-3 float-left">
                                <button class="btn btn-primary  text-white " type="submit">Update</button>
                            </div>


                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
