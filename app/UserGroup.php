<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class UserGroup extends Model
{
    /**
     * The table name that this model uses
     * 
     * @var string
     */
    protected $table = 'users_groups';

    /**
     * Returns the group the UserGroup is associated with.
     *  
     * @return \App\SantaGroup Database record of santa_groups.
     */
    public function group() {
    	return $this->belongsTo('\App\SantaGroup');
    }

    /**
     * Returns the user who will be receiving the present.
     * 
     * @return \App\User Instance of User who is receiving the present.
     */
    public function present_to_user() {
    	return $this->belongsTo('\App\User', 'present_to_user_id');
    }

    /**
     * Gets the user who is the "Santa"
     * 
     * @return \App\User The Santa user
     */
    public function santa() {
    	return $this->belongsTo('\App\User', 'user_id');
    }
}
