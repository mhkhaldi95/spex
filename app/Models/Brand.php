<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Brand extends Model
{
    use HasFactory;
    const FILLABLE = ['name','is_deleted'];

    protected $fillable = self::FILLABLE;
    public function scopeFilter($q){
        return $q;
    }
}
