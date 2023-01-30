@extends('layouts.app')
@section('title', 'Order Placed')



@section('content')


<style>
    body {
      text-align: center;
    
      background: #EBF0F5;
    }
      h1 {
        color: #88B04B;
        font-family: "Nunito Sans", "Helvetica Neue", sans-serif;
        font-weight: 900;
        font-size: 40px;
        margin-bottom: 10px;
      }
      p {
        color: #404F5E;
        font-family: "Nunito Sans", "Helvetica Neue", sans-serif;
        font-size:20px;
        margin: 0;
      }
      i {
      /* color: #9ABC66; */
      font-size: 100px;
      line-height: 200px;
      margin-left:-15px;
    }
    .card {
      background: white;
      padding: 60px;
      border-radius: 4px;
      box-shadow: 0 2px 3px #C8D0D8;
      display: inline-block;
      margin: 0 auto;
    }
  </style>
  <body>
    <div class="card">
    <div style="border-radius:200px; height:200px; width:200px; background: #F8FAF5; margin:0 auto;">
      <i class="checkmark" style="color:green">✓</i>
    </div>
      <h1>Success</h1> 
      <p>We received your purchase request;<br/> we'll be in touch shortly!</p>
      <div class="pt-4">
        <a href="{{url('/')}}" class="btn btn-info text-white">HOME PAGE</a>
      </div>
    </div>
   

@endsection 