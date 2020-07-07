<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class report extends Model
{
    protected $fillable = ['file'];
    //
    public function sysuser()
    {
        return $this->belongsTo('App\sysUser');
    }
}
