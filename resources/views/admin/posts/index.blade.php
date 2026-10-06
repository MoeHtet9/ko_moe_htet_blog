@extends('layouts.admin')
@section('content')
    <main>
        <div class="container-fluid px-4">
            <div class="my-3">
                <h1 class="mt-4 d-inline">Posts</h1>
                <a href="{{route('admin.posts.create')}}" class="btn btn-primary float-end">Create Post</a>
            </div>
            <ol class="breadcrumb mb-4">
                <li class="breadcrumb-item"><a href="{{route('admin.index')}}">Dashboard</a></li>
                <li class="breadcrumb-item active">Posts</li>
            </ol>
            <div class="card mb-4">
                <div class="card-header">
                    <i class="fas fa-table me-1"></i>
                    Posts List
                </div>
                <div class="card-body">
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th>No.</th>
                                <th>Title</th>
                                <th>Description</th>
                                <th>Image</th>
                                <th>Category</th>
                                <th>User</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tfoot>
                            <tr>
                                <th>No.</th>
                                <th>Title</th>
                                <th>Description</th>
                                <th>Image</th>
                                <th>Category</th>
                                <th>User</th>
                                <th>Action</th>
                            </tr>
                        </tfoot>
                        <tbody>
                            @php
                                $i = 1;
                            @endphp            
                            @foreach ($posts as $post)
                                <tr>
                                    <td>{{$i++}}</td>
                                    <td>{{$post->title}}</td>
                                    <td>{{Str::limit($post->description, 30)}}</td>
                                    <td>
                                        @if ($post->image)
                                            <img src="{{$post->image}}" alt="..." width="100">
                                        @endif
                                    </td>
                                    <td>{{$post->category->name}}</td>
                                    <td>{{$post->user->name}}</td>
                                    <td>
                                        <a href="#" class="btn btn-primary">Edit</a>
                                        <form action="" method="POST" class="d-inline">
                                            <button type="submit" class="btn btn-danger">Delete</button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>            
                    </table>
                </div>
            </div>
        </div>
    </main>
@endsection