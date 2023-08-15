<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductVariants extends Model
{
    use HasFactory;
    const FILLABLE = ['product_id','image','stoke','price','color'];

    protected $fillable = self::FILLABLE;
}
