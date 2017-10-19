<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Company as Company;
use Carbon\Carbon;

class Ad extends Model
{

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    //ad_type: 0 = basic ad, 1 = standard, 2 = premium, 3 = diamond
    protected $fillable = [
        'description',
        'category',
        'ref_number',
        'ad_type',
        'job_type',
        'low_experience',
        'term',
        'company_id',
        'career_level',
        'students',
        'country',
        'city',
        'salary_type',
        'salary_from',
        'salary_to',
        'currency',
        'foreign_languages',
        'questionnaire_id',
        'external_url',
        'position',
        'approved',
    ];

    public function company()
    {
    	return $this->belongsTo('App\Company');
    }

    public static function countAll()
    {
    	return Ad::where('approved','=','1')->count();
    }

    public static function countLastDay()
    {
    	return Ad::where('approved', '=', '1')->where('created_at', '>=', Carbon::today())->count();
    }
}