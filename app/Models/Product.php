<?php

namespace App\Models;

use App\Constants\Enum;
use App\Traits\SystemLog;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class Product extends Model
{
    use HasFactory,SystemLog;
    const FILLABLE = ['name','description','master_image','tags','collection_id','status','is_deleted'];

    protected $fillable = self::FILLABLE;
    protected $appends =['avatar'];

    public function scopeFilter($q)
    {
        // special for filter dashboard -- start
        $searchParams = [];
        if(request('search') && !is_null(request('search')['value'])){
            $searchParams = json_decode(request('search')['value'], true);
        }

        foreach ($searchParams as $column => $value) {
            if ($value !== '') {
                switch ($column) {
                    case 'search':
                        $q->where('name','like',"%$value%")
                            ->orWhere('description','like',"%$value%")
                            ->orWhere('tags','like',"%$value%");
                        break;
                    case 'collection_id':
                        $q->where('collection_id', $value);
                        break;
                    case 'status':
                        $q->where('status', $value);
                        break;
                    // Add additional cases for other columns if needed
                }
            }
        }
        // special for filter dashboard -- end

        return $q;
    }
    public function scopePublished($q){
        $q->where('status',Enum::PUBLISHED);
    }

    public function scopeActive($q){
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

        if($this->master_image == 'default.png'){
            return asset('assets/media/default.png');
        }
        return asset('storage/product-images/'.$this->master_image);
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
