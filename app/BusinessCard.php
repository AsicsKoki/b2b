<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class BusinessCard extends Model
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
        'office_out_country',
        'number_of_employees_bulgaria',
        'locations_bulgaria',
        'number_of_employees_worldwide',
        'locations_worldwide',
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'benefits' => 'array',
    ];

    public function company()
    {
    	return $this->hasOne('App\Company');
    }
}
