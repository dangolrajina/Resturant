<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Reservations extends Model
{

	protected $with = ['creator'];
	
    public function creator()
    {
    	return $this->belongsTo(User::class);
    }
}
