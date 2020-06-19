<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class product extends Model
{
    public function reviews()
    {
        return $this->hasMany('App\Model\review');
    }
    //
}
