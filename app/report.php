<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class report extends Model
{
    protected $fillable = ['file', 'sys_id'];
    //


    protected $uploadPath = "PDF\\";

    public function getFileAttribute($report)
    {
        return $this->uploadPath . $report;
    }

    public function sysuser()
    {
        return $this->belongsTo('App\sysUser', 'id', 'sys_id');
    }
}
