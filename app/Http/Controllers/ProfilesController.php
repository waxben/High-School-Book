<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Profile;
use App\Requests\UpdateProfileForm as Update;

class ProfilesController extends Controller
{
    //
    public function index($slug)
    {
        // @todo: decide whether the slug passed in should be authenticated or not.
    	$user = User::where('slug', $slug)->first();
    	return view('profiles.profile', compact('user'));
    }

    //
    public function edit()
    {
    	return view('profiles.edit')
    			->with('userProfile', \Auth::user()->profile);
    }

    //
    public function update(Profile $profile)
    {
    	$profile->updateUserInfo(request([
            'location', 'religion', 'hometown', 'residence', 'about', 'dob', 'high_school_name', 'high_school_location', 'started_school_at', 'completed_school_at'
            ]));
        
        if (request()->hasFile('avatar')) {
            User::updateAvatar();
        }

        session()->flash('success', 'Profile update successful.');
        return redirect()->back();

    }
}
