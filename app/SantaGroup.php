<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SantaGroup extends Model
{
    /**
     * The table name that this model uses.
     * 
     * @var string
     */
    protected $table = 'santa_groups';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['group_name'];

    /**
     * Gets the group owner.
     * 
     * @return \App\User Related instance of the group owner.
     */
    public function owner() {
    	return $this->hasOne('\App\User', 'id', 'group_owner_id');
    }

    /**
     * Gets all UserGroups associated with the SantaGroup
     * 
     * @return \App\UserGroup All applicable instances
     */
    public function userGroups() {
    	return $this->hasMany('\App\UserGroup', 'group_id');
    }
}
