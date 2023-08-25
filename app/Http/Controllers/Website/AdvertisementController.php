<?php

namespace App\Http\Controllers\Website;

use App\Constants\Enum;
use App\Constants\StatusCodes;
use App\Http\Controllers\Controller;
use App\Http\Requests\Brands\BrandRequest;
use App\Http\Requests\UserManagement\Customers\CustomerRequest;
use App\Http\Requests\Website\AccountRequest;
use App\Http\Resources\Brands\BrandResource;
use App\Models\Advertisement;
use App\Models\Brand;
use App\Models\Cart;
use App\Models\CartItem;
use App\Models\Order;
use App\Models\OrderItem;
use App\Models\ProductVariants;
use App\Models\User;
use Illuminate\Database\QueryException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;


class AdvertisementController extends Controller
{


    public function index(){
        $advertisements = Advertisement::query()->active()->get();
        return response()->json([
           'items' => $advertisements
        ]);
    }
}
