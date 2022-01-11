<?php

namespace App\Http\Controllers;

use App\Author;
use App\Category;
use App\Feedback;
use App\Http\Requests\FeedbackRequest;
use App\Http\Sections\Lessons;
use App\Incategory;
use App\Lesson;
use App\Services\GetUrlYoutube;
use App\Subscribe;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Response;
use Illuminate\Support\Facades\Validator;
use Mail;
use OpenGraph;


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
        $lessons = Lesson::with('relLessonToCategory')->orderBy('created_at', 'desc')->take(10)->get();
        $authors = Author::where('active', 1)->orderBy('order')->get();

        $tags = [
            ['type' => 'title', 'content' => 'заголовок'],
            ['type' => 'description', 'content' => 'опис'],
        ];

        $og = OpenGraph::title('XEOL | Головна')
            ->type('page')
            ->sitename('XEOL - Ваш помічник у світі ІТ')
            ->image(url('/images/og_main.png'))
            ->description('Завдання з програмування та ІТ, які супроводжуються відеоматеріалами пояснень їх виконання.')
            ->url();

        return view('index', [
            'categories' => $categories,
            'lessons' => $lessons,
            'authors' => $authors
        ]);
    }


    public function lessons()
    {
//        $categories = Category::with('categoriesCount')->where(['parent_id'=>0,'active'=>1])->orderBy('order')->get();
//
//        $lessons = Incategory::with('relToLesson')->get();
//        $keyed = $lessons->groupBy('category_id');

//        $categories = Category::with('relCategoryToLesson')->get();


        $categories = Category::with(['relCategoryToLesson' => function ($query) {
            $query->orderBy('view', 'desc');
        }])->orderBy('order')->get();

        $og = OpenGraph::title('XEOL | Уроки')
            ->type('page')
            ->sitename('XEOL - Ваш помічник у світі ІТ')
            ->image(url('/images/og_main.png'))
            ->description('Завдання з програмування та ІТ, які супроводжуються відеоматеріалами пояснень їх виконання.')
            ->url();

        return view('lessons', [
            'categories' => $categories,
        ]);
    }

    public function lesson($lesson_id, $category_id)
    {
        $lesson = Lesson::with('relLessonToCategory')->where('id', $lesson_id)->first();
        $lessons_current_category = Category::with(['relCategoryToLesson' => function ($query) {
            $query->orderBy('view', 'desc');
        }])->where('categories.id', $category_id)->get();

        //  dd($lessons_current_category);

        $video_id = GetUrlYoutube::geturl($lesson->text);
        $video_inf = [
            'views' => 0,
            'likes' => 0,
            'dislikes' => 0,
            'created_at' => 0
        ];

        if ($video_id != '') {
            $video_inf = GetUrlYoutube::youtubeinfo($video_id);

            if ($video_inf['views'] == 0) $lesson->view++;
            else $lesson->view = $video_inf['views'];

            if ($lesson->image == null) {
                $lesson->image = 'https://img.youtube.com/vi/' . $video_id . '/0.jpg';
            }

            $date = Carbon::parse($video_inf['created_at']);
            if ($lesson->created_at == null) $lesson->created_at = $date;
            $lesson->save();
        }

        $og = OpenGraph::title('XEOL | ' . $lesson->title)
            ->type('page')
            ->sitename('XEOL - Ваш помічник у світі ІТ')
            ->image($lesson->image ?? '')
            ->description($lesson->text)
            ->url();

        return view('lesson', [
            'lesson' => $lesson,
            'lessons' => $lessons_current_category,
        ]);
    }

    public function category($category_id, Request $request)
    {
        $lessons = Incategory::with(['relToLesson','relToCategory'], function  ($query){
            $query->orderBy('view', 'desc');
        })->join('lessons','lessons.id','=','incategories.lesson_id')
            ->where('incategories.category_id',$category_id);

        if(isset($request['tags']))
        {
            $tags = explode(",",$request['tags']);
            $lessons->where(function($query)use($tags){
                foreach ($tags as $tag){
                    if($tag!=""){
                    $query->orWhere('lessons.tags', 'like', '%' . $tag . '%');
                }
                }
            });
        }

        $category = Category::find($category_id);
        $lessons = $lessons->orderBy('view','DESC')->get();

        if (!$lessons->isEmpty())
            $og = OpenGraph::title('XEOL | ' . $category->title)
                ->type('page')
                ->sitename('XEOL - Ваш помічник у світі ІТ')
                ->image($category->img ?? '')
                ->description($category->description)
                ->url();

        return view('category', [
            'category' => $category,
            'lessons' => $lessons,
            'tags' => $request['tags'] ? explode(",",$request['tags']) : [],
            'stringTags' => $request['tags'] ?? ''
        ]);
    }

    public function subscribe(Request $request)
    {

        $validator = Validator::make($request->all(), [
            'email' => 'required|email|unique:subscribes,email|min:3'
        ]);

        if ($validator->passes()) {
            $data = $request->all();
            $subscribe = new Subscribe;
            $subscribe->email = $data['email'];
            $subscribe->save();
            return Response::json(['success' => '1']);
        }
        return Response::json(['errors_sc' => $validator->errors()]);
    }

    public function feedback()
    {
        return view('feedback');
    }

    public function addfeedback(FeedbackRequest $request)
    {
        $data = $request->all();
        $feedback = new Feedback;
        $feedback->name = $data['name'];
        $feedback->email = $data['email_fb'];
        $feedback->text = $data['text'];
        $feedback->save();

        $message = "Дякуємо. Повідомлення успішно надіслане.";
//        dd($message);
        Mail::send(
            ['text' => 'mail'],
            ['name' => $feedback->name, 'email_fb' => $feedback->email, 'text' => $feedback->text],
            function ($message) {
                $message->to('savitoleg@ukr.net', 'to admin')->subject("Зворотній зв'язок new.xeol.com.ua");

            }
        );

        return redirect()->route('feedback')->with(['flash_message' => $message]);
    }
}
