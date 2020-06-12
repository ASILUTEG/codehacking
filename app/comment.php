<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class comment extends Model
{
    protected $fillable = ['status', 'Author', 'email', 'body', 'post_id', 'photo_id'];
    public function replays()
    {
        return $this->hasMany('App\replay');
    }
    public function post()
    {
        return $this->belongsTo('App\posts',  'post_id', 'id');
    }
    public function photo()
    {
        return $this->belongsTo('App\photo');
    }
}
