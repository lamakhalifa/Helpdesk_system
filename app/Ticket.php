<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;

class Ticket extends Model implements HasMedia
{

    use InteractsWithMedia;
    use SoftDeletes;
    protected $fillable = [
        'title',
        'content',
        'customer_id',
        'category_id',
        'agent_id',
    ];

    protected $dates = ['delete_al'];
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

    public function comments(){
        return $this->hasMany(Comment::class, 'ticket_id');

    }


}
