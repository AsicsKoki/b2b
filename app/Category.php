<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Ad as Ad;

class Category extends Model
{

 	protected $fillable = [
    	'name',
    ];

    public function ads()
    {
    	return $this->belongsToMany('App\Ad', 'ad_categories');
	}

    public static function getCategories()
    {
    	return Category::all();
    }
}