<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Company as Company;
use App\User as User;


class Application extends Model
{

    protected $fillable = [
        'user_id',
        'ad_id',
        'cover_letter',
        'notiffication'
    ];

    public function company()
    {
    	return $this->belongsTo('App\Company');
    }

    public function user()
    {
    	return $this->belongsTo('App\User', 'user_id');
    }

   	public function Ad()
    {
    	return $this->belongsTo('App\Ad', 'ad_id');
    }
}
