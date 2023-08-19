<?php

namespace App\Http\Controllers\Reports;

use App\Constants\StatusCodes;
use App\Http\Controllers\Controller;
use App\Http\Requests\Advertisements\AdvertisementRequest;
use App\Http\Resources\Advertisements\AdvertisementResource;
use App\Http\Resources\Brands\BrandResource;
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
    public function brands(Request $request)
    {
        $mostPurchasedBrands = Brand::select('brands.name as brand_name', DB::raw('COUNT(*) as purchase_count'))
            ->join('collections', 'brands.id', '=', 'collections.brand_id')
            ->join('products', 'collections.id', '=', 'products.collection_id')
            ->join('order_items', 'products.id', '=', 'order_items.product_id')
            ->join('orders', 'order_items.order_id', '=', 'orders.id')
            ->when(request('datefilter') && !empty(request('datefilter')),function ($qq){
                    $qq->where('orders.created_at','>=', convetDate(explodeDate()[0]). ' 00:00:00')
                        ->where('orders.created_at','<=', convetDate(explodeDate()[1]). ' 23:59:59')
                    ;
            })
            ->groupBy('brands.name')
            ->orderByDesc('purchase_count')
            ->get();


        $page_breadcrumbs = [
            ['page' => route('dashboard.index'), 'title' => 'Home', 'active' => true],
            ['page' => '#', 'title' => 'Reports', 'active' => false],
            ['page' => '#', 'title' => 'Brands', 'active' => false],
        ];
        return view('dashboard.reports.brands', [
            'page_title' => 'Reports Brands',
            'page_breadcrumbs' => $page_breadcrumbs,
            'mostPurchasedBrands' => $mostPurchasedBrands,

        ]);
    }
    public function products(Request $request)
    {

        $mostPurchasedProducts = Product::select('products.name as product_name', DB::raw('COUNT(*) as purchase_count'))
            ->join('collections', 'products.collection_id', '=', 'collections.id')
            ->join('brands', 'collections.brand_id', '=', 'brands.id')
            ->join('order_items', 'products.id', '=', 'order_items.product_id')
            ->join('orders', 'order_items.order_id', '=', 'orders.id')
            ->when(request('datefilter') && !empty(request('datefilter')),function ($qq){
                $qq->where('orders.created_at','>=', convetDate(explodeDate()[0]). ' 00:00:00')
                    ->where('orders.created_at','<=', convetDate(explodeDate()[1]). ' 23:59:59')
                ;
            })
            ->when(request('brand_id') && !empty(request('brand_id')),function ($qq){
                $qq->where('brands.id', request('brand_id'));
            })
            ->when(request('collection_id') && !empty(request('collection_id')),function ($qq){
                $qq->where('collections.id', request('collection_id'));
            })
            ->groupBy('products.name')
            ->orderByDesc('purchase_count')
            ->get();

        $page_breadcrumbs = [
            ['page' => route('dashboard.index'), 'title' => 'Home', 'active' => true],
            ['page' => '#', 'title' => 'Reports', 'active' => false],
            ['page' => '#', 'title' => 'Products', 'active' => false],
        ];
        return view('dashboard.reports.products', [
            'page_title' => 'Reports Products',
            'page_breadcrumbs' => $page_breadcrumbs,
            'mostPurchasedProducts' => $mostPurchasedProducts,
            'brands' => Brand::query()->get(),
            'collections' => Collection::query()->get(),

        ]);
    }


}
