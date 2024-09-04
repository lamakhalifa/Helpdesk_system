<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    protected $fillable = [
        'agent_id',
        'ticket_id',
        'content'
    ];


    public function agent()
    {
        return $this->belongsTo(User::class, 'agent_id');
    }

    public function ticket()
    {
        return $this->belongsTo(Ticket::class, 'ticket_id');
    }
}
