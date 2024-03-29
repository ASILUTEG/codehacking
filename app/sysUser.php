<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class sysUser extends Model
{
    //
    protected $fillable = ['user_name', 'password', 'branch', 'esl_no', 'yearn', 'report_id'];

    public function report()
    {
        return $this->hasOne('App\report', 'sys_id', 'id');
    }
}
