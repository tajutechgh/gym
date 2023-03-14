<?php

namespace App\Model\admin;

use Illuminate\Database\Eloquent\Model;

class Trainer extends Model
{
    public function members()
    {
        return $this->hasMany('App\Model\admin\Member','trainer_id');
    }
}
