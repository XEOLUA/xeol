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

//    public function categoriesCount()
//    {
//        return $this->hasOne('App\Incategory')
//            ->selectRaw('category_id, count(*) as cnt')
//            ->groupBy('category_id');
//    }
//
//    public function getCategoriesCountAttribute()
//    {
//        // if relation is not loaded already, let's do it first
//        if ( ! array_key_exists('categoriesCount', $this->relations))
//            $this->load('categoriesCount');
//
//        $related = $this->getRelation('categoriesCount');
//
//        // then return the count directly
//        return ($related) ? (int) $related->cnt : 0;
//    }


    public function relCategoryToLesson()
    {
        return $this->belongsToMany('App\Lesson','incategories');
    }

    public function getOrderField()
    {
        return 'order';
    }

    /**
     * @return array
     */
    public function getTags(): array
    {
        return explode(",",$this->tags);
    }

    /**
     * @param array $tags
     *
     * @return void
     */
    public function setTags(array $tags): void
    {
        $this->tags = implode(",",$tags);
    }
}
