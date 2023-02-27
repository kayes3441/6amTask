<?php

namespace App\Http\Controllers\Blog;

use App\Http\Controllers\Controller;
use App\Models\Post;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        return view('front.home.home', [
            'posts' => Post::orderBy('id', 'desc')->with('frontUser','comment')->paginate(9),
        ]);
    }
    public function detail($id){

       return view('front.home.details',
       [
           "post" =>  Post::where('id', $id)->with('frontUser')->first(),
       ]);
    }

}
