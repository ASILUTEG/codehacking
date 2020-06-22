<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class review extends Model
{
    //
    protected $fillable = ['customer', 'review', 'star'];
    public function product()
    {
        return $this->belongsTo('App\Model\product');
    }
}
