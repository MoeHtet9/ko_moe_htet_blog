<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
class FrontController extends Controller
{
    public function index(){
        $posts = Post::orderBy('id', 'desc')->get();
        $featurePost = Post::orderBy('id', 'desc')->first();
        return view('front.index',compact('posts','featurePost'));
    }

    public function detail($id){
        $post = Post::find($id);
        return view('front.detail',compact('post'));
    }
}
