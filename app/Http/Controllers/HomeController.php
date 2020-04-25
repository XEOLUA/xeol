<?php

namespace App\Http\Controllers;

use App\Category;
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
        $categories = Category::with('categoriesCount')->where(['parent_id'=>0,'active'=>1])->orderBy('order')->get();

        return view('lessons',[
            'categories' => $categories,
        ]);
    }
}
