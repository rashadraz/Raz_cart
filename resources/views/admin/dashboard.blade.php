@extends('layouts.admin')

@section('content')
    <div class="row">
        <div class="col-md-12 grid-margin">
            @if (session()->has('message'))
                <h2 class="alert alert-success">{{ session('message') }}</h2>
            @endif
            <div class="me-md-3 me-xl-5">
                <h2>Dashboard</h2>
                <p class="mb-md-0">Your Cart Analystics</p>
                <hr>
               

            </div>
            <div class="row">
              <div class="col-md-3">
                <div class="card card-body bg-primary text-white mb-3">
                  <label for="" class="text-center">Total Products</label>
                  <h1 class="text-center">{{$totalProducts}}</h1>
                  <a href="{{url('admin/products')}}" class="text-white btn btn-primary">View</a>
                </div>
              </div>
              <div class="col-md-3">
                <div class="card card-body bg-dark text-white mb-3">
                  <label for="" class="text-center">Total Categories</label>
                  <h1 class="text-center">{{$totalCategories}}</h1>
                  <a href="{{url('admin/category')}}" class="text-white btn btn-dark">View</a>
                </div>
              </div>
              <div class="col-md-3">
                <div class="card card-body bg-warning text-white mb-3">
                  <label for="" class="text-center">Total Brands</label>
                  <h1 class="text-center">{{$totalBrands}}</h1>
                  <a href="{{url('admin/brands')}}" class="text-white btn btn-warning">View</a>
                </div>
              </div>
           
            </div>
            <hr>
            <div class="row">
              <div class="col-md-3">
                <div class="card card-body bg-primary text-white mb-3">
                  <label for="" class="text-center">Total Orders</label>
                  <h1 class="text-center">{{$totalOrder}}</h1>
                  <a href="{{url('admin/orders')}}" class="text-white btn btn-primary">View</a>
                </div>
              </div>
              <div class="col-md-3">
                <div class="card card-body bg-success text-white mb-3">
                  <label for="" class="text-center">Today Orders</label>
                  <h1 class="text-center">{{$todayOrder}}</h1>
                  <a href="{{url('admin/orders')}}" class="text-white btn btn-success">View</a>
                </div>
              </div>
              <div class="col-md-3">
                <div class="card card-body bg-secondary text-white mb-3">
                  <label for="" class="text-center">This Month Order</label>
                  <h1 class="text-center">{{$thisMonthOrder}}</h1>
                  <a href="{{url('admin/orders')}}" class="text-white btn btn-secondary">View</a>
                </div>
              </div>
              <div class="col-md-3">
                <div class="card card-body bg-danger text-white mb-3">
                  <label for="" class="text-center">This Year Order</label>
                  <h1 class="text-center">{{$thisYearOrder}}</h1>
                  <a href="{{url('admin/orders')}}" class="text-white btn btn-danger">View</a>
                </div>
              </div>
            </div>
            <hr>
            <div class="row">
              <div class="col-md-3">
                <div class="card card-body bg-primary text-white mb-3">
                  <label for="" class="text-center">Total Registered Users</label>
                  <h1 class="text-center">{{$totalUsers}}</h1>
                  <a href="{{url('admin/users')}}" class="text-white btn btn-primary">View</a>
                </div>
              </div>
              <div class="col-md-3">
                <div class="card card-body bg-success text-white mb-3">
                  <label for="" class="text-center">Total User</label>
                  <h1 class="text-center">{{$totalUser}}</h1>
                  <a href="{{url('admin/users')}}" class="text-white btn btn-success">View</a>
                </div>
              </div>
              <div class="col-md-3">
                <div class="card card-body bg-info text-white mb-3">
                  <label for="" class="text-center">Total Admin</label>
                  <h1 class="text-center">{{$totalAdmin}}</h1>
                  <a href="{{url('admin/users')}}" class="text-white btn btn-info">View</a>
                </div>
              </div>
              

            </div>
        </div>
    </div>
@endsection
