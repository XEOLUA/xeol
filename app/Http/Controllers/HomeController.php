<?php

namespace App\Http\Controllers;

use App\Category;
use App\Incategory;
use App\Lesson;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
//    public function __construct()
//    {
//        $this->middleware('auth');
//    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('index');
    }
    public function lessons(){
//        $categories = Category::with('categoriesCount')->where(['parent_id'=>0,'active'=>1])->orderBy('order')->get();
//
//        $lessons = Incategory::with('relToLesson')->get();
//        $keyed = $lessons->groupBy('category_id');

//        $categories = Category::with('relCategoryToLesson')->get();


        $categories = Category::with(['relCategoryToLesson' => function($query)
        {
            $query->orderBy('view', 'desc');
        }])->get();


        return view('lessons',[
            'categories' => $categories,
        ]);
    }

    public function lesson($lesson_id){
        $lesson = Lesson::with('relLessonToCategory')->where('id',$lesson_id)->get();
        $lessons_current_category = Category::with(['relCategoryToLesson' => function($query)
        {
            $query->orderBy('view', 'desc');
        }])->get();

      //  dd($lessons_current_category);

        return view('lesson',[
            'lesson' => $lesson,
            'lessons' => $lessons_current_category
        ]);
    }

    public function category($category_id){
        $categories = Category::with(['relCategoryToLesson'=> function($query)
        {
            $query->orderBy('view', 'desc');
        }])->where('categories.id',$category_id)->get();

        return view('category',[
            'categories' => $categories,
        ]);;
    }
}
