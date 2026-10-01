<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\Category;
class FrontController extends Controller
{
    public function index(){
        $featurePost = Post::with('category')->orderBy('id', 'desc')->first();
        $posts = Post::with('category')->where('id', '!=', $featurePost->id)->orderBy('id', 'DESC')->paginate(8);
        return view('front.index',compact('posts','featurePost'));
    }

    public function postsCategory($id){
        $postsCategory = Post::with('category')->where('category_id',$id)->orderBy('id','DESC')->paginate(8);
        return view('front.posts-category',compact('postsCategory'));
    }

    public function detail($id){
        $post = Post::with('category')->find($id);
        return view('front.detail',compact('post'));
    }

}
