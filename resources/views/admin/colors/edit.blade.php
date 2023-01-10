@extends('layouts.admin')

@section('content')

<div class="row">
    <div class="col-md-12">
        @if (session('message'))
        <h6 class="alert alert-success">{{ session('message') }}</h6>
        @endif
        <div class="card">
            <div class="card-header">
                <h3>Edit Colors 
                    <a href="{{ url('admin/colors') }}"
                        class="btn btn-danger float-end btn-sm text-white">BACK</a>
                </h3>
            </div>
            <div class="card-body">
               <form action="{{url('admin/colors/'.$color->id)}}" method="POST">
                @csrf
                @method('PUT')
                <div class="mb-3">
                    <label for="">Color Name</label>
                    <input type="text" class="form-control" value="{{$color->name}}" name="name">
                </div>
                <div class="mb-3">
                    <label for="">Color Code</label>
                    <input type="text" class="form-control" value="{{$color->code}}" name="code">
                </div>
                <div class="mb-3">
                    <div class="form-check">
                        <label class="form-check-label">
                          <input type="checkbox" class="form-check-input" name="status" {{$color->status ? 'checked' : ''}}>
                          Status - Checked = Hidden | Unchecked = Visible
                        </label>
                    </div>
                </div>

                <div class="mb-3">
                    <button type="submit" class="btn btn-primary btn-block btn-flat text-white">Update</button>
                </div>
               </form>
            </div>
        </div>
    </div>
</div>


@endsection