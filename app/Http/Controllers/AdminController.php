<?php

namespace App\Http\Controllers;
use App\Models\Product;
use App\Models\User;
use App\Models\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
class AdminController extends Controller
{
    //
    public function index()
    {
        // Get total counts
        $totalProducts = Product::count();
        $totalUsers    = User::count();
        $totalOrders   = Order::count();

        
        $categories = Order::select('product_name', DB::raw('COUNT(*) as count'))
                           ->groupBy('product_name')
                           ->pluck('product_name')
                           ->toArray();

        $productCounts = Order::select('product_name', DB::raw('COUNT(*) as count'))
                              ->groupBy('product_name')
                              ->pluck('count')
                              ->toArray();

        $orderDates = Order::select(DB::raw("DATE_FORMAT(order_date, '%Y-%m-%d') as date"), DB::raw('COUNT(*) as count'))
                           ->groupBy('date')
                           ->orderBy('date', 'ASC')
                           ->pluck('date')
                           ->toArray();

        $orderCounts = Order::select(DB::raw("DATE_FORMAT(order_date, '%Y-%m-%d') as date"), DB::raw('COUNT(*) as count'))
                            ->groupBy('date')
                            ->orderBy('date', 'ASC')
                            ->pluck('count')
                            ->toArray();

        return view('admin.dashboard', compact(
            'totalProducts', 'totalUsers', 'totalOrders',
            'categories', 'productCounts', 'orderDates', 'orderCounts'
        ));
    }
}
