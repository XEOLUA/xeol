<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Author extends Authenticatable
{
    use \SleepingOwl\Admin\Traits\OrderableModel;
    protected $table = 'authors';
    protected $fillable = ['name'];

    public function getOrderField()
    {
        return 'order';
    }
}
