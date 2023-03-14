<?php

namespace App\Model\admin;

use Illuminate\Database\Eloquent\Model;

class Attendance extends Model
{
    public function member()
    {
        return $this->belongsTo('App\Model\admin\Member','member_id');
    }
}
