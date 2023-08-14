<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Support\Facades\App;

class Setting extends Model
{
    use HasFactory;

    const FILLABLE = ['key','value_ar','value_en'];

    protected $fillable = self::FILLABLE;
    protected $appends = ['value'];


    public function getValueAttribute()
    {
        if($this->key == 'site_icon'){
            if ($this->value_en == 'icon_site.png') {
                return asset('assets/media/icons/icon_site.png');
            }
            return asset('storage/site-icons/' . $this->value_en);
        }elseif($this->key == 'navbar_logo'){
            if($this->value_en == 'i-icon.png'){
                return asset('assets/landing_page/images/i-icon.png');
            }
            return asset('storage/site-icons/'.$this->value_en);
//                        :
        }elseif($this->key == 'footer_logo'){
            if($this->value_en == 'footer-logo.png'){
                return asset('').'assets/landing_page/images/'.$this->value_en;
            }
            return asset('storage/footer-logo/'.$this->value_en);
//                        :
        }else{
            if (app()->getLocale() == 'ar') {
                return $this->value_ar;
            }
            return $this->value_en;
        }

    }

}
