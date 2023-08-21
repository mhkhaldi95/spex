<?php

namespace App\Http\Controllers\Website;

use App\Constants\StatusCodes;
use App\Http\Controllers\Controller;
use App\Http\Requests\Brands\BrandRequest;
use App\Http\Resources\Brands\BrandResource;
use App\Models\Brand;
use App\Models\Collection;
use Illuminate\Database\QueryException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;


class CollectionController extends Controller
{

    public function products($id){

       $collection =  Collection::query()->findOrFail($id);
        return view('website.products', [
            'page_title' =>'Products',
            'collection' =>$collection,
            'products' =>$collection->products,
        ]);
    }



}
