<?php

namespace App\Http\Controllers\Reports;

use App\Constants\StatusCodes;
use App\Http\Controllers\Controller;
use App\Http\Requests\Advertisements\AdvertisementRequest;
use App\Http\Resources\Advertisements\AdvertisementResource;
use App\Models\Advertisement;
use App\Models\Brand;
use App\Models\Collection;
use App\Models\Order;
use App\Models\OrderItem;
use App\Models\Product;
use App\Models\User;
use Illuminate\Database\QueryException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;


class ReportController extends Controller
{

    public function customers(Request $request)
    {

        $orders = Order::query()->filter()->get();
        $total_amount = Order::query()->filter()->sum('price');
        $products_purchase = OrderItem::query()->with('product')->select('product_id', DB::raw('count(*) as purchase_count'))
            ->groupBy('product_id')
            ->orderByDesc('purchase_count')
            ->get();
        $products_ids = array_unique($products_purchase->pluck('product_id')->toArray());

        $collection_ids = Product::query()->whereIn('id',$products_ids)->pluck('collection_id')->unique()->toArray();
        $collections = Collection::query()->whereIn('id',$collection_ids)->get();



        //get brands
        $brands_ids = $collections->pluck('brand_id')->unique()->toArray();
        $brands = Brand::query()->whereIn('id',$brands_ids)->get();





        $page_breadcrumbs = [
            ['page' => route('dashboard.index'), 'title' => 'Home', 'active' => true],
            ['page' => '#', 'title' => 'Reports', 'active' => false],
            ['page' => '#', 'title' => 'Customers', 'active' => false],
        ];
        return view('dashboard.reports.customers', [
            'page_title' => 'Reports Customers',
            'page_breadcrumbs' => $page_breadcrumbs,
            'customers' => User::query()->customers()->get(),
            'orders' => $orders,
            'total_amount' => $total_amount,
            'products_purchase' => $products_purchase,
            'collections' => $collections,
            'brands' => $brands,
        ]);
    }


}
