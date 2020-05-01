<?php

namespace App\Http\Controllers;

use App\Category;
use App\Incategory;
use App\Lesson;
use App\Services\GetUrlYoutube;
use Carbon\Carbon;
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
        $categories = Category::with('relCategoryToIncategory')->orderBy('order')->get();

        return view('index', [
            'categories' => $categories
        ]);
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
        }])->orderBy('order')->get();


        return view('lessons',[
            'categories' => $categories,
        ]);
    }

    public function lesson($lesson_id,$category_id){
        $lesson = Lesson::with('relLessonToCategory')->where('id',$lesson_id)->first();
        $lessons_current_category = Category::with(['relCategoryToLesson' => function ($query)
        {
            $query->orderBy('view', 'desc');
        }])->where('categories.id',$category_id)->get();

      //  dd($lessons_current_category);

        $video_id = GetUrlYoutube::geturl($lesson->text);
        $video_inf=[
            'views'=>0,
            'likes'=>0,
            'dislikes'=>0,
            'created_at'=>0
        ];

        if($video_id!=''){
            $video_inf = GetUrlYoutube::youtubeinfo($video_id);

            if($video_inf['views']==0) $lesson->view++;
             else $lesson->view = $video_inf['views'];

            if($lesson->image==null){
                $lesson->image='https://img.youtube.com/vi/'.$video_id.'/0.jpg';
            }

            $date = Carbon::parse($video_inf['created_at']);
            $lesson->created_at=$date;
            $lesson->save();
        }

        return view('lesson',[
            'lesson' => $lesson,
            'lessons' => $lessons_current_category,
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
