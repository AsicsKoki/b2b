<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class BuisnessCard extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'company_id',
        'main_activity',
        'founded_in',
        'number_of_employees',
        'locations',
        'benefits',
        'technologies',
    ];

    public function company()
    {
    	return $this->hasOne('App\Company');
    }
}
