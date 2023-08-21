<?php

namespace App\Models;

use App\Traits\SystemLog;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductImage extends Model
{
    use HasFactory,SystemLog;
    const FILLABLE = ['name','product_id'];

    protected $fillable = self::FILLABLE;
    public function getImageAttribute($value)
    {
        if ($value == 'default.png') {
            return asset('assets/media/default.png');
        }
        return asset('storage/product-images/' . $value);
    }
}
