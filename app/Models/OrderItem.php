<?php

namespace App\Models;

use App\Traits\SystemLog;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OrderItem extends Model
{
    use HasFactory,SystemLog;
    const FILLABLE = ['order_id','product_id','color','image','price','qty'];
    protected $with =['product'];
    protected $appends = ['image_path'];

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

    public function getImagePathAttribute(){
        if($this->image == 'default.png'){
            return asset('assets/media/default.png');
        }
        return asset('storage/product_color_image/'.$this->image);
    }









}
