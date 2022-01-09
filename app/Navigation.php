<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Navigation extends Authenticatable
{
    use \SleepingOwl\Admin\Traits\OrderableModel;
    protected $table = 'navigates';
    protected $fillable = ['title'];

    public function getOrderField()
    {
        return 'order';
    }
}
