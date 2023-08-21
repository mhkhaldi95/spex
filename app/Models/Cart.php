<?php

namespace App\Models;

use App\Constants\Enum;
use App\Traits\SystemLog;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cart extends Model
{
    use HasFactory,SystemLog;
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
                    case 'id':
                        $q->where('id', $value);
                        break;
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

        if(request('user_id') && !empty(request('user_id'))){
            $q->where('user_id', request('user_id'));
        }
        if(request('datefilter') && !empty(request('datefilter'))){
            $q->where('created_at','>=', convetDate(explodeDate()[0]). ' 00:00:00')
                ->where('created_at','<=', convetDate(explodeDate()[1]). ' 23:59:59')
            ;
        }

        return $q;
    }

    public function scopeActive($q){
        $q->where('is_deleted',0);
    }



    public function customer(){
        return $this->belongsTo(User::class,'user_id');
    }
    public function items(){
        return $this->hasMany(CartItem::class);
    }










}
