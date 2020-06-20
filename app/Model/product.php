<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class product extends Model
{
    protected $fillable = ['name', 'price', 'discount', 'stock', 'detail'];
    public function reviews()
    {
        return $this->hasMany('App\Model\review');
    }
    //
}
