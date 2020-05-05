<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Subscribe extends Authenticatable
{
    protected $table = 'subscribes';
    protected $fillable = ['email'];
}
