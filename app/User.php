<?php

namespace App;

use Laravel\Passport\HasApiTokens;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use HasApiTokens, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'firstname', 'lastname', 'job', 'institution', 'role', 'departement', 
        'region_id', 'responsable_id', 'email', 'password'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * eager loading
     */
	public function story()
    {
        return $this->hasOne('App\Model\Story');
    }

    public function likes()
    {
        return $this->hasMany("App\Model\Like", 'user_id');
    }
}
