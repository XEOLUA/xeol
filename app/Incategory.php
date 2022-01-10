<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Incategory extends Authenticatable
{
    protected $table = 'incategories';
    protected $guarded=['id'];
    public function relToCategory()
    {
        return $this->belongsTo('App\Category', 'category_id', 'id');
    }
    public function relToLesson()
    {
        return $this->belongsTo('App\Lesson', 'lesson_id', 'id');
    }
}
