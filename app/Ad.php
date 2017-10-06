<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Ad extends Model
{
    public function company()
    {
    	return $this->belongsTo('App\Company');
    }

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */

    protected $fillable = [
        'description',
        'category',
        'job_type',
        'term',
        'company_id',
        'career_level',
        'students'
        'country' ,
        'city',
        'salary_type'
        'salary_from',
        'salary_to',
        'foreign_languages',
        'questionnaire_id',
        'external_url',
        'position',

    ];
}