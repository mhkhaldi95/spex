<?php

namespace App\Models;

use App\Constants\Enum;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class Product extends Model
{
    use HasFactory;
    const FILLABLE = ['name','description','master_image','tags','collection_id','status','is_deleted'];

    protected $fillable = self::FILLABLE;
    protected $appends =['avatar','price_after_discount'];
    public function scopeFilter($q){

        if(!Auth::check() || Auth::user()->role == Enum::CUSTOMER){
            $col = 'search';
            $value = @request('search');
            $q->where("status",Enum::PUBLISHED); // show just PUBLISHED for customers
        }else{
            $col = @request('search')['regex'];
            $value = @request('search')['value'];
        }
        if($col == 'search'){
            $q->when(true,function ($qq) use ($value){
                $qq->orWhere('name','like',"%$value%")
                    ->orWhere('description','like',"%$value%")
                    ->orWhere('tags','like',"%$value%");
            });

        }

        if($col == 'status' && $value !=''){
            return $q->where("status",$value);
        }
        if(request('brand_id') && !empty(request('brand_id'))){
            return $q->where("brand_id",request('brand_id'));
        }
        return $q;
    }
    public function scopePublished($q){
        $q->where('status',Enum::PUBLISHED);
    }

    public function active($q){
        $q->where('is_deleted',0);
    }



    public function collection(){
        return $this->belongsTo(Collection::class);
    }
    public function variations(){
        return $this->hasMany(ProductVariants::class);
    }

    public function images(){
        return $this->hasMany(ProductImage::class);
    }




    public function getAvatarAttribute(){
        if($this->master_photo == 'default.png'){
            return asset('assets/media/default.png');
        }
        return asset('storage/product-images/'.$this->master_image);
    }

    public function getPriceAfterDiscountAttribute(){
        $price_after_discount = $this->price;
        if($this->discounted_price){
            switch ($this->discount_option){
                case Enum::DISCOUNT_PERCENTAGE :
                    $price_after_discount = $this->price -  ($this->price * ($this->discounted_price/100));break;
                case Enum::DISCOUNT_FIXED :
                    $price_after_discount = $this->price -  $this->discounted_price;break;
            }
        }
        return $price_after_discount;
    }
//    public function getBestSellingProducts(){
//        $bestSellingProducts = DB::table('order_items')
//            ->select('product_id', DB::raw('SUM(quantity) as total_quantity'))
//            ->groupBy('product_id')
//            ->orderBy('total_quantity', 'desc')
//            ->take(10)
//            ->get();
//
//        $productIds = $bestSellingProducts->pluck('product_id');
//        $bestSellingProductsData = Product::whereIn('id', $productIds)->get();
//        return $bestSellingProductsData;
//    }


}
