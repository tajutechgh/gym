<?php

namespace App\Model\admin;

use Illuminate\Database\Eloquent\Model;

class Membership extends Model
{
    public function members()
    {
        return $this->hasMany('App\Model\admin\Member','membership_id');
    }
}
