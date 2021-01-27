<?php

namespace App\Models\Entities\Core;


use App\Models\Entities\UserCard;
use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Tymon\JWTAuth\Contracts\JWTSubject;

class User extends Authenticatable implements JWTSubject, MustVerifyEmail
{
//    public const PLATFORM_ANDROID = 2;
//    public const PLATFORM_IOS = 1;

    public const AVATAR_DIRECTORY = "images/avatars";


    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'first_name', 'email', 'password', 'role_id', 'phone',
        'last_name','withdrawal_card_id','ref_user_id','ref_link'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function role()
    {
        return $this->belongsTo(Role::class, 'role_id');
    }

    public function getJWTIdentifier()
    {
        return $this->getKey();
    }

    public function getJWTCustomClaims()
    {
        return [];
    }

    public function isAdmin()
    {
        return $this->role_id == Role::ADMIN_ID;
    }

    public function devices() {
        return $this->hasMany(PushUser::class, 'user_id', 'id');
    }

    public function cards(){
        return $this->hasMany(UserCard::class,'user_id','id')->select(['last_four','id','user_id','type']);
    }

    public function withdrawal_card(){
        return $this->belongsTo(UserCard::class,'withdrawal_card_id','id')->select(['last_four','id','user_id','type']);
    }

}
