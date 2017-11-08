<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class WorkHistory extends Model
{
    protected $table = 'work_history';
    
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */

    protected $fillable = [
        'user_id', 'position', 'company_name', 'company_website', 'year_from', 'year_to', 'month_from', 'month_to', 'description'
    ];

    public function user()
    {
    	return $this->belongsTo('App\User');
    }
}
