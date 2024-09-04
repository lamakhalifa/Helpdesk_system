<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $fillable = [
        'title'
    ];

//    public function tickets()
//    {
//        return $this->belongsTo(Category::class);
//    }
    public function categories()
    {
        return $this->hasMany(Ticket::class);
    }
}
