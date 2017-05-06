<?php

namespace App;

use Illuminate\Database\Eloquent\Model as Eloquent;

class Model extends Eloquent
{

    /**
     * The attributes that are to be gaurded.
     *
     * @var array
     */
    protected $guarded = [];

}