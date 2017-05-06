<?php

namespace App;

use App\Traits\Friendable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;
    use Friendable;

    /**
     * The attributes that are to be gaurded.
     *
     * @var array
     */
    protected $guarded = [];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    public function profile()
    {
        return $this->hasOne(Profile::class);
    }

    //
    public static function updateAvatar()
    {
        \Auth::user()->update([
                    'avatar' => request('avatar')->store('public/avatars')
                ]);
    }

    //
    public function is_user($current_user_id)
    {
         if($current_user_id === $this->id){
            return true;
         }
         return false;
    }


}
