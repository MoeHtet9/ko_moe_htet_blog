<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\User;
use App\Models\Category;
class DashboardController extends Controller
{
    public function index(){
        $posts = Post::all();
        $admin_count = User::where('role_id', 1)->count();
        $author_count = User::where('role_id', 2)->count();
        $category_count = Category::count();
        return view('admin.index', compact('posts','admin_count','author_count','category_count'));
    }
}
