<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class replay extends Model
{

    protected $fillable = ['status', 'Author', 'email', 'body', 'comment_id', 'photo_id'];

    public function comment()
    {
        return $this->belongsTo('App\comment');
    }
    public function photo()
    {
        return $this->belongsTo('App\photo');
    }
    //
}
