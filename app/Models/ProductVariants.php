<?php

namespace App\Models;

use App\Traits\SystemLog;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductVariants extends Model
{
    use HasFactory,SystemLog;
    const FILLABLE = ['product_id','image','stoke','price','color'];
    protected $appends = ['image_path'];
    protected $fillable = self::FILLABLE;

    public function getImagePathAttribute()
    {
        if ($this->image == 'default.png') {
            return asset('assets/media/default.png');
        }
        return asset('storage/product_color_image/' . $this->image);
    }
}
