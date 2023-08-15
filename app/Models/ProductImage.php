<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductImage extends Model
{
    use HasFactory;
    const FILLABLE = ['name','product_id'];

    protected $fillable = self::FILLABLE;
}
