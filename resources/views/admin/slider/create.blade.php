@extends('layouts.admin')

@section('content')

<div class="row">
    <div class="col-md-12">
        @if (session('message'))
        <h6 class="alert alert-success">{{ session('message') }}</h6>
        @endif
        <div class="card">
            <div class="card-header">
                <h3>Add Slider</h3>
                    <a href="{{ url('admin/sliders') }}"
                        class="btn btn-danger float-end btn-sm text-white">BACK</a>
                </h3>
            </div>
            <div class="card-body">
               <form action="{{url('admin/sliders/create')}}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="mb-3">
                    <label for="">Title</label>
                    <input type="text" class="form-control" name="title">
                </div>
                <div class="mb-3">
                    <label for="">Description</label>
                    <textarea class="form-control" name="description" rows="3"></textarea>
                </div>
                <div class="mb-3">
                    <label for="">Image</label>
                    <input type="file" class="form-control" name="image"/>
                </div>

                <div class="mb-3">
                    <div class="form-check">
                        <label class="form-check-label">
                          <input type="checkbox" class="form-check-input" name="status">
                          Status - Checked = Hidden | Unchecked = Visible
                        </label>
                    </div>
                </div>

                <div class="mb-3">
                    <button type="submit" class="btn btn-primary btn-block btn-flat text-white">Save</button>
                </div>
               </form>
            </div>
        </div>
    </div>
</div>


@endsection