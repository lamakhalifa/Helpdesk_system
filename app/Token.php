<?php

namespace App;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Token extends Model
{
    use HasFactory;

    protected $table = 'password_create_tokens'; // TODO: password_reset_tokens

    public $timestamps = false;
    protected $fillable = ['email', 'token','url_token', 'created_at', 'expires_at'];
}
