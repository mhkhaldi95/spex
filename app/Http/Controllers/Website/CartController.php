<?php

namespace App\Http\Controllers\Website;

use App\Constants\Enum;
use App\Constants\StatusCodes;
use App\Http\Controllers\Controller;
use App\Http\Requests\Brands\BrandRequest;
use App\Http\Resources\Brands\BrandResource;
use App\Models\Brand;
use App\Models\Cart;
use App\Models\CartItem;
use Illuminate\Database\QueryException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;


class CartController extends Controller
{


    public function index(){
        $cart = Cart::query()->firstOrCreate(['user_id' => auth()->id()]);
        return view('website.cart');
    }

    public function addToCart(Request $request)
    {
        $qtys = $request->get('qtys',[]);
        $colors = $request->get('colors',[]);
        $prices = $request->get('prices',[]);
        $images = $request->get('images',[]);
        $newQtys = [];
        $newColors = [];
        $newPrices = [];
        $newImages = [];

        for ($i = 0; $i < count($request->qtys); $i++) {
            if ($request->qtys[$i] > 0) {
                $newQtys[] = $qtys[$i];
                $newColors[] = $colors[$i];
                $newPrices[] = $prices[$i];
                $newImages[] = $images[$i];
            }
        }

        $qtys = $newQtys;
        $colors = $newColors;
        $prices = $newPrices;
        $images = $newImages;

        $cart = Cart::query()->firstOrCreate(['user_id' => auth()->id()]);

        for ($i = 0; $i < count($qtys); $i++) {
            $existingCartItem = CartItem::where([
                'product_id' => $request->product_id,
                'color' => $colors[$i],
                'cart_id' => $cart->id,
            ])->first();

            if ($existingCartItem) {
                $existingCartItem->update([
                    'qty' => $existingCartItem->qty + $qtys[$i],
                    'price' => $prices[$i],
                    'image' => $images[$i],
                ]);
            } else {
                CartItem::create([
                    'product_id' => $request->product_id,
                    'color' => $colors[$i],
                    'cart_id' => $cart->id,
                    'qty' => $qtys[$i],
                    'price' => $prices[$i],
                    'image' => $images[$i],
                ]);
            }
        }


        $cart->items()->where('qty',0)->delete();

        return  $this->response_json(true,StatusCodes::OK,'Add Successfully',[
            'count_cart' => $cart->items->count()
        ]);
    }

}
