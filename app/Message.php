<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Application as Application;


class Message extends Model
{
protected $fillable = [
        'application_id',
        'text',
    ];

    public function application()
    {
    	return $this->belongsTo('App\Application', 'application_id');
    }
}