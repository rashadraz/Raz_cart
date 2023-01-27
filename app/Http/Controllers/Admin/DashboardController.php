<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Brand;
use App\Models\Category;
use App\Models\Order;
use App\Models\Product;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon as SupportCarbon;

class DashboardController extends Controller
{
    public function index()
    {
        $totalProducts = Product::count();
        $totalCategories = Category::count();
        $totalBrands = Brand::count();
        $totalUsers = User::count();
        $totalUser = User::where('role_as', 0)->count();
        $totalAdmin = User::where('role_as', 1)->count();

        $totalOrder = Order::count();

        $todayDate = SupportCarbon::now()->format('d-m-Y');
        $thisMonth = SupportCarbon::now()->format('m');
        $thisYear = SupportCarbon::now()->format('Y');

        $todayOrder = Order::whereDate('created_at', $todayDate)->count();
        $thisMonthOrder = Order::whereMonth('created_at', $thisMonth)->count();
        $thisYearOrder = Order::whereYear('created_at', $thisYear)->count();


        return view('admin.dashboard', compact(
            'totalProducts',
             'totalCategories',
              'totalBrands',
               'totalUsers',
                'totalUser', 
                'totalAdmin', 
                'totalOrder',
                'todayOrder',
                'thisMonthOrder',
                'thisYearOrder'
            ));
    }
}
