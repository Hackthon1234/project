<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Order;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
        public function dashboard()
        {
            $totalcategories = Category::count();
            $totalorders = Order::where('order_status', '!=', 'Cancelled')->count();
            $totalpendingorders = Order::where('order_status', 'Pending')->count();
            $totaldeliveredorders = Order::where('order_status', 'Delivered')->count();
            $totalprocessingorders = Order::where('order_status', 'Processing')->count();
            $totalproducts = Order::where('order_status', '!=', 'Cancelled')->count();
            return view('dashboard',compact('totalcategories','totalorders','totalpendingorders','totaldeliveredorders','totalprocessingorders','totalprocessingorders','totalproducts'));
        }
}
