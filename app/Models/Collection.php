<?php

namespace App\Models;

use App\Traits\SystemLog;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Collection extends Model
{
    use HasFactory,SystemLog;
    const FILLABLE = ['name','image','description','brand_id','is_deleted'];

    protected $fillable = self::FILLABLE;
    public function scopeFilter($q){
        // special for filter dashboard -- start
        $searchParams = [];
        if(request('search') && !is_null(request('search')['value'])){
            $searchParams = json_decode(request('search')['value'], true);
        }

        foreach ($searchParams as $column => $value) {
            if ($value !== '') {
                switch ($column) {
                    case 'search':
                        $q->where('name','like',"%$value%");
                        break;
                    case 'brand_id':
                        $q->where('brand_id',$value);
                        break;
                    case 'is_deleted':
                        $q->where('is_deleted', $value);
                        break;
                    // Add additional cases for other columns if needed
                }
            }
        }
        // special for filter dashboard -- end
        return $q;
    }
    public function brand(){
        return $this->belongsTo(Brand::class);
    }

    public function scopeActive($q){
        $q->where('is_deleted',0);
    }

    public function getImageAttribute($value)
    {
        if ($value == 'default.png') {
            return asset('assets/media/default.png');
        }
        return asset('storage/collections-image/' . $value);
    }
}
