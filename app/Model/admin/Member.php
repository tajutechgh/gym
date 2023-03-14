<?php

namespace App\Model\admin;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Member extends Model
{
    use SoftDeletes;
    
    protected $dates = ['deleted_at'];

    public function membership()
    {
        return $this->belongsTo('App\Model\admin\Membership','membership_id');
    }

    public function user()
    {
        return $this->belongsTo('App\Model\admin\User','user_id');
    }

    public function classe()
    {
        return $this->belongsTo('App\Model\admin\Classe','class_id');
    }

    public function group()
    {
        return $this->belongsTo('App\Model\admin\Group','group_id');
    }

    public function attendances()
    {
        return $this->hasMany('App\Model\admin\Attendance','member_id');
    }

    public function measurements()
    {
        return $this->hasMany('App\Model\admin\Measurement','member_id');
    }

    public function invoices()
    {
        return $this->hasMany('App\Model\admin\Invoice','member_id');
    }
}
