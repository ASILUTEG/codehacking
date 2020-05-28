<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class photo extends Model
{
    //
    protected $uploadPath = "/images/";
    protected $fillable = ['path'];
    public function getPathAttribute($photo)
    {
        return $this->uploadPath . $photo;
    }
}
