<?php

namespace App\Model\admin;

use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    public function permissions()
    {
    	return $this->belongsToMany('App\Model\admin\Permission','permission_roles','permission_id','role_id')->withTimestamps();
    }

    public function users()
    {
    	return $this->belongsToMany('App\Model\admin\User','user_roles','user_id','role_id')->withTimestamps();
    }
}
