<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Application as Application;


class Language extends Model
{
protected $fillable = [
        'language',
    ];

    public function application()
    {
    	return $this->belongsTo('App\Ad');
    }

    public static function getLanguages()
    {
        return Language::all();
    }

    public function user()
    {
        return $this->belongsTo('App\User');
    }
}