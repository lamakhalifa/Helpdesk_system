<?php

namespace App;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;
use Spatie\MediaLibrary\MediaCollections\Models\Media;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Comment extends Model implements HasMedia
{
    use InteractsWithMedia;
    use SoftDeletes;
    protected $fillable = [
        'user_id', // customer, agent, admin
        'ticket_id',
        'content',
        
    ];


    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function ticket()
    {
        return $this->belongsTo(Ticket::class, 'ticket_id');
    }

    public function registerMediaConversions(Media $media = null): void {
        $this->addMediaConversion('thumb')
        -> width(100);
    }
}
