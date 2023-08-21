<?php

namespace App\Models;

use App\Traits\SystemLog;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CartItem extends Model
{
    use HasFactory,SystemLog;
    const FILLABLE = ['cart_id','product_id','color','image','price','qty'];
    protected $with =['product'];
    protected $fillable = self::FILLABLE;

    public function scopeFilter($q)
    {



        return $q;
    }



    public function order(){
        return $this->belongsTo(Order::class);
    }

    public function product(){
        return $this->belongsTo(Product::class);
    }

    public function getImageAttribute($value){
        if($value == 'default.png'){
            return asset('assets/media/default.png');
        }
        return asset('storage/product-images/'.$value);
    }









}
