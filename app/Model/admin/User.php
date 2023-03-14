<?php

namespace App\Model\admin;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\SoftDeletes;

class User extends Authenticatable
{
    use Notifiable;

    use SoftDeletes;
    
    protected $dates = ['deleted_at'];

    protected $fillable = [
        'name', 'email', 'password','username','category','gender','image','phone','status',
    ];

    protected $hidden = [
        'password', 'remember_token',
    ];

    public function members()
    {
        return $this->hasMany('App\Model\admin\Member','user_id');
    }

    public function classes()
    {
        return $this->hasMany('App\Model\admin\Classe','user_id');
    }

    public function getNameAttribute($value)
    {
        return ucfirst($value);
    }

    public function roles()
    {
        return $this->belongsToMany('App\Model\admin\Role','user_roles','user_id','role_id')->withTimestamps();
    }
}
