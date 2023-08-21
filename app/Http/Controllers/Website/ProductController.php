<?php

namespace App\Http\Controllers\Website;

use App\Constants\StatusCodes;
use App\Http\Controllers\Controller;
use App\Http\Requests\Brands\BrandRequest;
use App\Http\Resources\Brands\BrandResource;
use App\Models\Brand;
use App\Models\Collection;
use App\Models\Product;
use Illuminate\Database\QueryException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;


class ProductController extends Controller
{

    public function show($id){

       $product =  Product::query()->findOrFail($id);
       dd($product->variations);
        return view('website.product', [
            'page_title' =>'Product',
            'product' =>$product,
        ]);
    }



}
