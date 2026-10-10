<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\Category;
use App\Http\Requests\PostRequest;
class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $posts = Post::with(['category', 'user'])->orderBy('id', 'desc')->paginate(15);
        return view('admin.posts.index', compact('posts'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories = Category::all();
        return view('admin.posts.create', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(PostRequest $request)
    {
        // dd($request);
        $post = Post::create($request->all());

        // file upload
        $file_name = time().'.'.$request->image->extension();//2242143142.jpg

        $upload = $request->image->move(public_path('images/post/'), $file_name); // folder upload

        if ($upload) {
            $post->image = "/images/post/".$file_name;
        }

        $post->save();

        return redirect()->route('admin.posts.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $post = Post::find($id);
        $categories = Category::all();
        return view('admin.posts.edit', compact('post','categories'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $post = Post::find($id);
        $post->update($request->all());

        if($request->hasFile('image')) {
            // file upload
            $file_name = time().'.'.$request->image->extension();//2242143142.jpg

            $upload = $request->image->move(public_path('images/post/'), $file_name); // folder upload

            if ($upload) {
                $post->image = "/images/post/".$file_name;
            }
        }else{
            $post->image = $request->old_image;
        }

        $post->save();

        return redirect()->route('admin.posts.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $post = Post::find($id);
        $post->delete();
        return redirect()->route('admin.posts.index');
    }
}
