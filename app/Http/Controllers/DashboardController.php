<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Order;
use App\Models\Product;
use App\Models\User;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
        public function dashboard()
        {
            // Get counts for statistics
            $totalcategories = Category::count();
            $totalorders = Order::where('order_status', '!=', 'Cancelled')->count();
            $totalpendingorders = Order::where('order_status', 'Pending')->count();
            $totaldeliveredorders = Order::where('order_status', 'Delivered')->count();
            $totalprocessingorders = Order::where('order_status', 'Processing')->count();
            $totalproducts = Product::count(); // Fix: Get actual product count
            $totalusers = User::count();
            
            // Get recent users for dashboard display
            $recentUsers = User::latest()->take(5)->get();
            
            // Get user statistics
            $totalAdmins = User::where('role', 'admin')->count();
            $totalRegularUsers = User::where('role', 'user')->count();
            $verifiedUsers = User::whereNotNull('email_verified_at')->count();
            $unverifiedUsers = User::whereNull('email_verified_at')->count();
            
            // Chart data - Order Status Distribution
            $orderStatusData = [
                'labels' => ['Pending', 'Processing', 'Delivered'],
                'data' => [$totalpendingorders, $totalprocessingorders, $totaldeliveredorders],
                'colors' => ['#FCD34D', '#06B6D4', '#10B981']
            ];
            
            // Chart data - User Registration Trend (last 6 months)
            $userGrowthData = [];
            for ($i = 5; $i >= 0; $i--) {
                $month = now()->subMonths($i);
                $count = User::whereYear('created_at', $month->year)
                            ->whereMonth('created_at', $month->month)
                            ->count();
                $userGrowthData['labels'][] = $month->format('M Y');
                $userGrowthData['data'][] = $count;
            }
            
            // Chart data - Monthly Sales (based on delivered orders)
            $salesData = [];
            for ($i = 5; $i >= 0; $i--) {
                $month = now()->subMonths($i);
                $sales = Order::where('order_status', 'Delivered')
                            ->whereYear('created_at', $month->year)
                            ->whereMonth('created_at', $month->month)
                            ->sum('price');
                $salesData['labels'][] = $month->format('M Y');
                $salesData['data'][] = $sales ?: 0;
            }
            
            return view('dashboard', compact(
                'totalcategories',
                'totalorders', 
                'totalpendingorders', 
                'totaldeliveredorders', 
                'totalprocessingorders', 
                'totalproducts',
                'totalusers',
                'recentUsers',
                'totalAdmins',
                'totalRegularUsers',
                'verifiedUsers',
                'unverifiedUsers',
                'orderStatusData',
                'userGrowthData',
                'salesData'
            ));
        }
}
