<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Lesson extends Authenticatable
{
    protected $table = 'lessons';
    protected $fillable = ['title'];

    public function relLessonToIncategory()
    {
        return $this->hasMany('App\Incategory', 'lesson_id', 'id');
    }

    public function relLessonToCategory()
    {
        return $this->belongsToMany('App\Category','incategories');
    }
}
