<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Report extends Model
{
    protected $fillable = [
        'text',
];

    public function company()
    {
        return $this->belongsTo('App\Company');
    }
    
}
