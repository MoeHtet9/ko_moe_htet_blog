@extends('layouts.front')
@section('content')
        <!-- Page content-->
        <div class="container mt-5">
            <div class="row">
                <!-- Blog entries-->
                <div class="col-lg-8">
                    <!-- Nested row for non-featured blog posts-->
                    <div class="row">
                            <!-- Blog post-->
                            @foreach($postsCategory as $post)
                            <div class="card m-2 col-md-5">
                                <a href="#!"><img class="card-img-top" src="{{$post->image}}" alt="..." /></a>
                                <div class="card-body">
                                    <a href="{{route('posts.category',$post->category_id)}}" class="btn btn-sm btn-secondary text-white">{{ $post->category->name }}</a>
                                    <div class="small text-muted">{{$post->created_at}}</div>
                                    <h2 class="card-title h4">{{$post->title}}</h2>
                                    <p class="card-text">{{Str::limit($post->description,100)}}</p>
                                    <a class="btn btn-primary" href="{{route('detail',$post->id)}}">Read more →</a>
                                </div>
                            </div>
                            @endforeach

                            {{$postsCategory->links()}}
                    </div>
                </div>
                <!-- Side widgets-->
                <div class="col-lg-4">
                    <!-- Categories widget-->
                    <div class="card mb-4">
                        <div class="card-header">Categories</div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-sm-6">
                                    <ul class="list-unstyled mb-0">
                                        @php
                                            $categories = \App\Models\Category::all();
                                        @endphp
                                        @foreach($categories as $category)
                                            <li><a href="{{route('posts.category',$category->id)}}">{{$category->name}}</a></li>
                                        @endforeach
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
@endsection