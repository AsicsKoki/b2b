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
    	return $this->belongsToMany('App\Ad', 'ad_categories', 'ad_id', 'category_id');
	}

    public static function getCategories()
    {
    	return Category::all();
    }

    
}