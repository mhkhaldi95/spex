<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Resources\Orders\OrderResource;
use App\Models\Order;
use App\Models\Product;
use App\Models\StartEndTime;
use App\Models\Trip;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{
    public function index()
    {
        $mostPurchasedProducts = Product::select('products.name as product_name', 'products.id as product_id', DB::raw('COUNT(*) as purchase_count'))
            ->join('collections', 'products.collection_id', '=', 'collections.id')
            ->join('brands', 'collections.brand_id', '=', 'brands.id')
            ->join('order_items', 'products.id', '=', 'order_items.product_id')
            ->join('orders', 'order_items.order_id', '=', 'orders.id')
            ->groupBy('products.id', 'products.name')
            ->orderByDesc('purchase_count')
            ->get();
        $page_breadcrumbs = [
            ['page' => '#', 'title' => 'home', 'active' => false],
        ];

        return view('dashboard.dashboard', [
            'page_title' => 'home',
            'page_breadcrumbs' => $page_breadcrumbs,
            'mostPurchasedProducts' => $mostPurchasedProducts,
            'recent_orders' => Order::query()->orderByDesc('created_at')->get()->take(10),
        ]);
    }
}
