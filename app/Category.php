<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Ad as Ad;

class Category extends Model
{
    public function ads()
    {
    	return $this->belongsToMany('Ad');
	}
}