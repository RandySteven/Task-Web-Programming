@extends('layouts.app')

@section('title', 'Dashboard')

@section('style')
    <style>
        div{
            color:white;
        }
    </style>
@endsection

@section('content')
    <div class="container my-2">
        <div class="row">
            <div class="card text-white bg-success mb-3 col-sm mx-2" style="max-width: 18rem;">
                <div class="card-header">User</div>
                <div class="card-body">
                <h5 class="card-title">User</h5>
                <p class="card-text">{{ $users->count() }}</p>
                </div>
            </div>
            <div class="card text-white bg-danger mb-3 col-sm mx-2" style="max-width: 18rem;">
                <div class="card-header">Categories</div>
                <div class="card-body">
                <h5 class="card-title">Categories</h5>
                <p class="card-text">{{ $categories->count() }}</p>
                </div>
            </div>
            <div class="card text-white bg-warning mb-3 col-sm mx-2" style="max-width: 18rem;">
                <div class="card-header">Posts</div>
                <div class="card-body">
                <h5 class="card-title">Posts</h5>
                <p class="card-text">{{ $posts->count() }}</p>
                </div>
            </div>
        </div>
    </div>

        <div class="container my-2" style="color: black">
            <div class="row my-2">
                User : <strong>{{ $users->count() }}</strong>
                <table class="table table-dark">
                    <thead>
                      <tr>
                        <th scope="col">#</th>
                        <th scope="col">Name</th>
                        <th scope="col">Email</th>
                        <th scope="col">Posts</th>
                        <th scope="col">Action</th>
                      </tr>
                    </thead>
                    <tbody>
                        @foreach ($users as $user)
                        <tr>
                            <th scope="row">{{ $loop->iteration }}</th>
                            <td>{{ $user->name }}</td>
                            <td>{{ $user->email }}</td>
                            <td>{{ $user->posts->count() }}</td>
                            <td><a href="{{ route('user', $user->id) }}" class="btn btn-success">See user</a></td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>

            <div class="row my-2">
                Post Data : <strong>{{ $posts->count() }}</strong>
                <table class="table table-dark">
                    <thead>
                      <tr>
                        <th scope="col">#</th>
                        <th scope="col">Title</th>
                        <th scope="col">User</th>
                        <th scope="col">Category</th>
                        <th scope="col">Action</th>
                      </tr>
                    </thead>
                    <tbody>
                        @foreach ($posts as $post)
                        <tr>
                            <th scope="row">{{ $loop->iteration }}</th>
                            <td>{{ $post->title }}</td>
                            <td>{{ $post->user_id }}</td>
                            <td>{{ $post->category->name }}</td>
                            <td>
                                <form action="{{ route('post.delete', $post->slug) }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button class="btn-danger">Delete</button>
                                </form>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>


@endsection
