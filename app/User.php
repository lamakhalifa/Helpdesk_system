<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use Notifiable;
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'email',
      'password',
      'role',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ]; // phpstorm
    public function tickets(){
        $column = $this->role === 'admin' || $this->role === 'agent' ?
        'agent_id' : 'customer_id';

        return $this->hasMany(Ticket::class, $column);
    }
    public function comments(){
        return $this->hasMany(Comment::class, 'user_id');
    }
}
