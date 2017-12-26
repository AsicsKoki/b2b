<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Application as Application;


class Message extends Model
{
protected $fillable = [
        'application_id',
        'first_name',
        'last_name',
        'company_name',
        'text',
    ];

    public function application()
    {
    	return $this->belongsTo('App\Application', 'application_id');
    }

    public function file()
    {
        return $this->hasOne('App\File');
    }
}