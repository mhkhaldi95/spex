<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use App\Constants\Enum;
use App\Traits\SystemLog;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\Auth;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;
    use SystemLog;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */

    const FILLABLE = [
        'name',
        'email',
        'password',
        'role',
        'phone',
        'username',
        'photo',
        'is_deleted',
    ];
    protected $fillable = self::FILLABLE;

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $appends = ['photo_path'];
    protected $casts = [
        'email_verified_at' => 'datetime',
        'password' => 'hashed',
    ];



    public function getPhotoPathAttribute()
    {
        if ($this->photo == 'blank.png') {
            return asset('assets/media/avatars/' . $this->photo);
        }
        return asset('storage/user-photos/' . $this->photo);
    }



    public function scopeAdmins($q)
    {
        return $q->where('role', Enum::ADMIN);
    }
    public function scopeCustomers($q)
    {
        return $q->where('role', Enum::CUSTOMER);
    }

    public function isAdmin()
    {
        return in_array($this->role, [Enum::ADMIN, Enum::SUPER_ADMIN]);
    }



    public function scopeFilter($q)
    {
        $col = @request('search')['regex'];
        $value = @request('search')['value'];
        if ($value) {
            $q->where('name','like' , "%$value%")->orWhere('phone','like' , "%$value%");
        }
        return $q;
    }
}
