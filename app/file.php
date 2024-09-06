<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class file extends Model
{
    protected $fillable = ['name'];
    public function fileable(){
        return $this->morphTo();
    }
}
