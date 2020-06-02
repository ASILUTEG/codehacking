<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class posts extends Model
{
    //
    protected $fillable = ['title', 'body', 'photo_id', 'catogery_id', 'user_id'];
    public function user()
    {
        return $this->belongsTo('App\User');
    }
    public function photo()
    {
        return $this->belongsTo('App\photo');
    }
    public function catogery()
    {
        return $this->belongsTo('App\catogery');
    }
}
