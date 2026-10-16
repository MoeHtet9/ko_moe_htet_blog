@extends('layouts.admin')
@section('content')
                <main>
                    <div class="container-fluid px-4">
                        <h1 class="mt-4">Dashboard</h1>
                        <ol class="breadcrumb mb-4">
                            <li class="breadcrumb-item active">Dashboard</li>
                        </ol>
                        <div class="row">
                            <div class="col-xl-3 col-md-6">
                                <div class="card bg-primary text-white mb-4">
                                    <div class="card-body">Admins</div>
                                    <div class="card-footer d-flex align-items-center justify-content-between">
                                        <h3 class="text-white">{{$admin_count}}</h3>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-3 col-md-6">
                                <div class="card bg-warning text-white mb-4">
                                    <div class="card-body">Authors</div>
                                    <div class="card-footer d-flex align-items-center justify-content-between">
                                        <h3 class="text-white">{{$author_count}}</h3>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-3 col-md-6">
                                <div class="card bg-success text-white mb-4">
                                    <div class="card-body">Posts</div>
                                    <div class="card-footer d-flex align-items-center justify-content-between">
                                        <h3 class="text-white">{{$posts->count()}}</h3>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-3 col-md-6">
                                <div class="card bg-danger text-white mb-4">
                                    <div class="card-body">Categories</div>
                                    <div class="card-footer d-flex align-items-center justify-content-between">
                                        <h3 class="text-white">{{$category_count}}</h3>
                                    </div>
                                </div>
                            </div>
                        </div>
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
                                                <td>
                                                    @if ($post->image)
                                                        <img src="{{$post->image}}" alt="..." width="100">
                                                    @endif
                                                </td>
                                                <td>{{$post->category->name}}</td>
                                                <td>{{$post->user->name}}</td>
                                                <td>
                                                    <a href="{{route('admin.posts.edit', $post->id)}}" class="btn btn-warning">Edit</a>
                                                    <a class="btn btn-danger delete" data-id="{{$post->id}}">Delete</a>
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