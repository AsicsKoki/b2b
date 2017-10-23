<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Ad as Ad;
use App\User as User;
use App\Company as Company;


class Conversation extends Model
{
protected $fillable = [
        'user_id',
        'company_id',
        'ad_id',
        'text',
    ];

    public function ad()
    {
    	return $this->belongsTo('App\Ad');
    }

    public function user()
    {
    	return $this->belongsTo('App\User');
    }

    public function company()
    {
    	return $this->belongsTo('App\Company');
    }
}
