<?php

namespace App\Models;

use App\Traits\SystemLog;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Brand extends Model
{
    use HasFactory,SystemLog;
    const FILLABLE = ['name','image','description','is_deleted'];

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
    public function collections(){
        return $this->hasMany(Collection::class);
    }
    public function getImageAttribute($value)
    {
            if ($value == 'default.png') {
                return asset('assets/media/default.png');
            }
            return asset('storage/brands-image/' . $value);
    }

}
