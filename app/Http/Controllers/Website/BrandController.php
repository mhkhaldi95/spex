<?php

namespace App\Http\Controllers\Website;

use App\Constants\StatusCodes;
use App\Http\Controllers\Controller;
use App\Http\Requests\Brands\BrandRequest;
use App\Http\Resources\Brands\BrandResource;
use App\Models\Brand;
use Illuminate\Database\QueryException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;


class BrandController extends Controller
{

    public function index(Request $request){

       $brands =  Brand::query()->with('collections')->active()->get();
        return view('website.brands', [
            'page_title' =>'Brands',
            'brands' =>$brands
        ]);
    }
    public function collections($id){

       $brand =  Brand::query()->findOrFail($id);
        return view('website.collections', [
            'page_title' =>'Collections',
            'collections' =>$brand->collections,
            'brand' =>$brand
        ]);
    }



}
