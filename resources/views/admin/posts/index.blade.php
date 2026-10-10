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

<!-- Delete Modal -->
<div class="modal fade" id="deleteModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header bg-danger text-light">
        <h1 class="modal-title fs-5" id="exampleModalLabel">Delete...</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <h3>Are you sure delete?</h3>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">No</button>
        <form action="" method="post" id="deleteForm">
            @csrf
            @method('delete')
            <button class="btn btn-danger" type="submit">Yes</button>
        </form>
      </div>
    </div>
  </div>
</div>

<script>
    $(document).ready(function() {
        $('tbody').on('click','.delete',function() {
            $('#deleteModal').modal('show');
            let id = $(this).data('id');
            $('#deleteForm').attr('action',`posts/${id}`);
        })
    })
</script>
@endsection