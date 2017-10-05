<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\Model;


class Company extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'company_name',
        'country',
        'foreign_name',
        // 'email',
        'password',
        'username',
        'register_type',
        'pib' ,
        'company_registered_office',
        'company_type',
        'sector',
        'company_website',
        'company_phone',
        'company_address',
        'first_name',
        'last_name',
        'position',
        'business_phone',
        'business_email',
        'manager_first_name',
        'manager_last_name',
        'manager_position',
        'manager_phone',
        'manager_email',
        'administrative_contact_first_name',
        'administrative_contact_last_name',
        'administrative_contact_position',
        'administrative_contact_business_phone',
        'administrative_contact_business_email',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function image()
    {
    	return $this->hasMany('App\Image');
    }

    public function buisnessCard()
    {
    	return $this->hasOne('App\BuisnessCard');
    }

    public function ads()
    {
    	return $this->hasMany('App\Ad');
    }
}
