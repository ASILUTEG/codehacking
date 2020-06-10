<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class replay extends Model
{

    protected $fillable = ['status', 'Author', 'email', 'body', 'post_id'];

    public function comment()
    {
        return $this->belongsTo('App\comment');
    }
    //
}
