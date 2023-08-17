<?php

namespace App\Models;

use App\Constants\Enum;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;
    const FILLABLE = ['user_id','price','status','is_deleted'];

    protected $fillable = self::FILLABLE;

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
                    case 'user_id':
                        $q->where('user_id', $value);
                        break;
                    case 'status':
                        $q->where('status', $value);
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

    public function scopeActive($q){
        $q->where('is_deleted',0);
    }



    public function customer(){
        return $this->belongsTo(User::class,'user_id');
    }
    public function items(){
        return $this->hasMany(OrderItem::class);
    }










}
