<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Order;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon as SupportCarbon;
use Barryvdh\DomPDF\Facade\Pdf;

class OrderController extends Controller
{
    public function index(Request $request)
    {


        // $todayDate =  SupportCarbon::now();  
        // $orders = Order::whereDate('created_at',$todayDate)->paginate(10);



        $todayDate =  SupportCarbon::now()->format('Y-m-d');
        $orders = Order::when($request->date != null, function ($q) use ($request) {
            return $q->whereDate('created_at', $request->date);
        }, function ($q) use ($todayDate) {

            $q->whereDate('created_at', $todayDate);
        })
            ->when($request->status != null, function ($q) use ($request) {

                return $q->where('status_message', $request->status);
            })

          
            ->paginate(10);
        return view('admin.orders.index', compact('orders'));
    }

    public function show($orderId)
    {

        $order = Order::whereDate('id', $orderId)->first();
        if ($order) {
            return view('admin.orders.view', compact('order'));
        } else {
            return redirect('admin/orders')->with('message', 'Order Id not Found');
        }
    }

    public function updateOrderStatus($orderId , Request $request)
    {   
        
        $order = Order::whereDate('id', $orderId)->first();
        if ($order) {
            $order->update([
                'status_message'=>$request->order_status
            ]);
            return redirect('admin/orders/'.$orderId)->with('message', 'Order Status Updated Successfully');
        } else {
            return redirect('admin/orders/'.$orderId)->with('message', 'Order Id not Found');
        }

    }

    public function viewInvoice($orderId)
    {
        $order = Order::findOrFail($orderId);

        return view('admin.invoice.generate-invoice',compact('order'));
    }



    public function generateInvoice($orderId)
    {
        $order = Order::findOrFail($orderId);
        $data = ['order' => $order];
        $todayDate = Carbon::now()->format('d-m-Y');
        
        $pdf = Pdf::loadView('admin.invoice.generate-invoice', $data);
        return $pdf->download('invoice-'.$orderId.'-'.$todayDate.'.pdf');

    }
}
