<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Category extends Authenticatable
{
    use \SleepingOwl\Admin\Traits\OrderableModel;
    protected $table = 'categories';
    protected $fillable = ['title'];

    public function relCategoryToIncategory()
    {
        return $this->hasMany('App\Incategory', 'category_id', 'id');
    }

    public function relCategoryToLesson()
    {
        return $this->belongsToMany('App\Lesson');
    }

    public function getOrderField()
    {
        return 'order';
    }
}
