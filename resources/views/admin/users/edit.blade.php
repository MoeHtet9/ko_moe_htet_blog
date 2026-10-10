@extends('layouts.admin')
@section('content')
<div class="container-fluid px-4">
    <div class="my-3">
        <h1 class="mt-4 d-inline">Edit User</h1>
        <a href="{{ route('admin.users.index') }}" class="btn btn-danger float-end">Back</a>
    </div>
    <ol class="breadcrumb mb-4">
        <li class="breadcrumb-item"><a href="{{ route('admin.index') }}">Dashboard</a></li>
        <li class="breadcrumb-item"><a href="{{ route('admin.users.index') }}">Users</a></li>
        <li class="breadcrumb-item active">Edit User</li>
    </ol>

    <div class="card mb-4">
        <div class="card-header">
            <i class="fas fa-table me-1"></i>
            Edit User
        </div>
        <div class="card-body">
        <form action="{{route('admin.users.update', $user->id)}}" method="post" enctype="multipart/form-data">
            @csrf
            @method('put')
            <div class="mb-3">
                <label for="name" class="form-label">Name</label>
                <input type="text" class="form-control @error('name') is-invalid @enderror" name="name" id="name" value="{{$user->name}}">
                @error('name')
                    <div class="text-danger sm">{{$message}}</div>
                @enderror
            </div>
            <div class="mb-3">
                <label for="email" class="form-label">Email</label>
                <input type="text" class="form-control @error('name') is-invalid @enderror" name="email" id="email" value="{{$user->email}}">
                @error('email')
                    <div class="text-danger sm">{{$message}}</div>
                @enderror
            </div>
            <!-- password -->
                <input type="hidden" class="form-control" name="password" id="password" value="{{$user->password}}">
            <!-- password end -->
            <div class="mb-3">
                <label for="role_id" class="form-label">Role</label>
                <select class="form-select" name="role_id">
                    <option value="2" {{$user->role_id == 2 ? 'selected':''}}>Author</option>
                    <option value="1" {{$user->role_id == 1 ? 'selected':''}}>Admin</option>
                </select>
            </div>
            <div class="d-grid gap-2">
                <button class="btn btn-primary" type="submit">Save</button>
            </div>
        </form>
        </div>
    </div>
</div>
@endsection
