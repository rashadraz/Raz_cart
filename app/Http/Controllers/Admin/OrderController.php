<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Order;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon as SupportCarbon;

class OrderController extends Controller
{
    public function index()
    {
        $todayDate =  SupportCarbon::now();  
        $orders = Order::whereDate('created_at',$todayDate)->paginate(10);
        return view('admin.orders.index',compact('orders'));
    }

    public function show($orderId)
    {

        $order = Order::whereDate('id',$orderId)->first();
        if($order)
        {
            return view('admin.orders.view',compact('order'));
        }else{
            return redirect('admin/orders')->with('message','Order Id not Found');
        }

      



    }
}
