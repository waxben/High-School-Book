<?php

namespace App;

use App\Model;

class Profile extends Model
{
	//
	public function updateUserInfo($value = array())
	{
		// return static::update($value);
		// return $this->user()->update($value);
		return \Auth::user()->profile()->update($value);
		
	}

    //
    public function user()
    {
    	return $this->belongsTo(User::class);
    }
}
