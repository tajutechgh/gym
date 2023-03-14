<?php

namespace App\Model\admin;

use Illuminate\Database\Eloquent\Model;

class Days extends Model
{
    public function classes()
    {
    	return $this->belongsToMany('App\Model\admin\Classe','class_days','class_id','day_id')->withTimestamps();
    }
}
