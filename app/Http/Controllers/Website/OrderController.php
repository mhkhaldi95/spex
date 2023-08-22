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
use App\Models\Order;
use App\Models\OrderItem;
use App\Models\ProductVariants;
use Illuminate\Database\QueryException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;


class OrderController extends Controller
{


    public function index(){
        $orders = Order::query()->where(['user_id' => auth()->id()])->get();
        return view('website.myaccount',[
            'orders' => $orders
        ]);
    }


    public function store(Request $request)
    {
        $qtys = $request->get('qtys',[]);
        $colors = $request->get('colors',[]);
        $prices = $request->get('prices',[]);
        $images = $request->get('images',[]);
        $product_ids = $request->get('product_ids',[]);

        $newQtys = [];
        $newColors = [];
        $newPrices = [];
        $newImages = [];
        $newProduct_ids = [];


        for ($i = 0; $i < count($qtys); $i++) {
            if ($qtys[$i] > 0) {
                $newQtys[] = $qtys[$i];
                $newColors[] = $colors[$i];
                $newPrices[] = $prices[$i];
                $newImages[] = $images[$i];
                $newProduct_ids[] = $product_ids[$i];

            }
        }
        $qtys = $newQtys;
        $colors = $newColors;
        $prices = $newPrices;
        $images = $newImages;
        $product_ids = $newProduct_ids;

        DB::beginTransaction();
        try {
            $order = Order::query()->create([
                'user_id' => auth()->id()
            ]);

            $total = 0;
            for ($i = 0; $i < count($qtys); $i++) {
                $total += $qtys[$i] * $prices[$i];
                OrderItem::query()->create([
                    'product_id' => $product_ids[$i],
                    'order_id' => $order->id,
                    'color' => $colors[$i],
                    'qty' => $qtys[$i],
                    'price' => $prices[$i],
                    'image' => $images[$i],
                ]);

               $variant =  ProductVariants::query()->where('product_id',$product_ids[$i])->where('image',$images[$i])->firstOrFail();

               if($qtys[$i] > $variant->stoke){
                   return $this->outOfStoke($variant->product->name,$variant->color);
               }

               $variant->update([
                    'stoke' => $variant->stoke - $qtys[$i]
                ]);

            }
            $order->update([
                'price' =>$total
            ]);

            $cart = Cart::query()->where('user_id' , auth()->id())->firstOrFail();
            $cart->items()->delete();
            $cart->delete();
            DB::commit();
            return  $this->returnBackWithSaveDone();
        } catch (QueryException $exception) {
            return $this->invalidIntParameter();
        }





    }

}
