@extends('layouts.admin')
@section('content')
<div class="container-fluid px-4">
    <div class="my-3">
        <h1 class="mt-4 d-inline">New Post</h1>
        <a href="{{ route('admin.posts.index') }}" class="btn btn-danger float-end">Back</a>
    </div>
    <ol class="breadcrumb mb-4">
        <li class="breadcrumb-item"><a href="{{ route('admin.index') }}">Dashboard</a></li>
        <li class="breadcrumb-item"><a href="{{ route('admin.posts.index') }}">Posts</a></li>
        <li class="breadcrumb-item active">Create Post</li>
    </ol>

    <div class="card mb-4">
        <div class="card-header">
            <i class="fas fa-table me-1"></i>
            Create Post
        </div>
        <div class="card-body">
        <form action="{{route('admin.posts.store')}}" method="post" enctype="multipart/form-data">
            @csrf
            <div class="mb-3">
                <label for="title" class="form-label">Title</label>
                <input type="text" class="form-control @error('title') is-invalid @enderror" name="title" id="title" value="{{old('title')}}">
               
                @error('title')
                    <div class="text-danger sm">{{$message}}</div>
                @enderror
            </div>
            <div class="mb-3">
                <label for="description">Description</label>
                <textarea name="description" id="description" class="form-control @error('description') is-invalid @enderror">{{old('description')}}</textarea>

                @error('description')
                    <div class="text-danger sm">{{$message}}</div>
                @enderror
            </div>
            <div class="mb-3">
                <label for="image" class="form-label">Image</label>
                <input type="file" accept="image/*" class="form-control @error('image') is-invalid @enderror" name="image" id="image">

                @error('image')
                    <div class="text-danger sm">{{$message}}</div>
                @enderror
            </div>
            <div class="mb-3">
                <label for="category" class="form-label">Category</label>
                <select class="form-select @error('category_id') is-invalid @enderror" name="category_id">
                    <option value="">Choose Category</option>
                    @foreach ($categories as $category)
                        <option value="{{ $category->id }}">{{ $category->name }}</option>
                    @endforeach

                    @error('category_id')
                        <div class="text-danger sm">{{$message}}</div>
                    @enderror
                </select>
            </div>
            <!-- user_id -->
            <input type="hidden" class="form-control" name="user_id" id="user_id" value="37">
            <!-- user id end -->
            <div class="d-grid gap-2">
                <button class="btn btn-primary" type="submit">Save</button>
            </div>
        </form>
        </div>
    </div>
</div>
<script>
      $('#description').summernote({
        placeholder: 'Hello stand alone ui',
        tabsize: 2,
        height: 120,
        toolbar: [
          ['style', ['style']],
          ['font', ['bold', 'underline', 'clear']],
          ['color', ['color']],
          ['para', ['ul', 'ol', 'paragraph']],
          ['table', ['table']],
          ['insert', ['link', 'picture', 'video']],
          ['view', ['fullscreen', 'codeview', 'help']]
        ]
      });
    </script>
@endsection
