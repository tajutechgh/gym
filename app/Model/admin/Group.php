<?php

namespace App\Model\admin;

use Illuminate\Database\Eloquent\Model;

class Group extends Model
{
    public function members()
    {
        return $this->hasMany('App\Model\admin\Member','group_id');
    }
}
