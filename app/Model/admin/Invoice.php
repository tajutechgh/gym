<?php

namespace App\Model\admin;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Invoice extends Model
{
	use SoftDeletes;
    
    protected $dates = ['deleted_at'];
    
    public function member()
    {
        return $this->belongsTo('App\Model\admin\Member','member_id');
    }
}
