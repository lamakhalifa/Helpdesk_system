<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Ticket extends Model
{


    protected $fillable = [
        'title',
        'content',
        'customer_id',
        'category_id',
        'agent_id',
    ];

    public function customer()
    {
        return $this->belongsTo(User::class, 'customer_id');
    }


    public function agent()
    {
        return $this->belongsTo(User::class, 'agent_id');
    }

    public function category()
    {
        return $this->belongsTo(Category::class, 'category_id');
    }

    public function file() {
        return $this->morphMany(File::class,'fileable');
    }

}
