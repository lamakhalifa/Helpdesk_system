<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class category extends Model
{
    protected $fillable = [
        'title'
    ];
    public function tickets(){
       return $this->belongsTo(Category::class);
    }
}
