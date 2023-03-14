<?php

namespace App\Model\admin;

use Illuminate\Database\Eloquent\Model;

class Classe extends Model
{
    public function members()
    {
        return $this->hasMany('App\Model\admin\Member','class_id'); 
    }

    public function user()
    {
        return $this->belongsTo('App\Model\admin\User','user_id');
    }

    public function attendance()
    {
        return $this->belongsTo('App\Model\admin\Attendance','class_id');
    }

    public function days()
    {
    	return $this->belongsToMany('App\Model\admin\Days','class_days','class_id','day_id')->withTimestamps();
    }
}
