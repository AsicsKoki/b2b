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
        'name', 
        'email', 
        'password', 
        'register_type', 
        'pib', 
        'foreign_name', 
        'company_type', 
        'sector', 
        'website', 
        'phone', 
        'address', 
        'first_name', 
        'last_name', 
        'position', 
        'business_phone', 
        'business_email', 
        'newsletter', 
        'username',
        'is_manager', 
        'manager_first_name', 
        'manager_last_name', 
        'manager_position', 
        'manager_phone', 
        'manager_email', 
        'key', 
        'active', 
        'has_vat',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];
}
