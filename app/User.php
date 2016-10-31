<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
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
     * Gets the user groups that this user is a santa for
     * a
     * @return \App\UserGroup UserGroup instances
     */
    public function santa_of() {
        return $this->hasMany('\App\UserGroup', 'user_id');
    }

    /**
     * Gets the user groups that this user is a recipient for.
     * 
     * @return \App\UserGroup UserGroup Instances
     */
    public function recipient_of() {
        return $this->hasMany('\App\UserGroup', 'present_to_user_id');
    }
}
