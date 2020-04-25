<?php

namespace App\Providers;

use App\Category;
use App\Incategory;
use App\Lesson;
use App\Navigation;
use App\User;
use SleepingOwl\Admin\Providers\AdminSectionsServiceProvider as ServiceProvider;

class AdminSectionsServiceProvider extends ServiceProvider
{

    /**
     * @var array
     */
    protected $sections = [
        User::class => 'App\Http\Sections\Users',
        Navigation::class => 'App\Http\Sections\Navigates',
        Category::class => 'App\Http\Sections\Categories',
        Lesson::class => 'App\Http\Sections\Lessons',
        Incategory::class => 'App\Http\Sections\LessonsInCategory',
    ];

    /**
     * Register sections.
     *
     * @param \SleepingOwl\Admin\Admin $admin
     * @return void
     */
    public function boot(\SleepingOwl\Admin\Admin $admin)
    {
    	//

        parent::boot($admin);
    }
}
