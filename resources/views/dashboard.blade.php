@extends('layouts.app')

@section('title', 'Dashboard')

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
                @foreach ($users as $user)
                    <div class="card mx-3 my-2" style="width: 18rem;">
                        <img src="{{ $user->gravatar() }}" class="card-img-top" alt="...">
                        <div class="card-body">
                        <p class="card-text">Name : {{ $user->name }}</p>
                        <p class="card-text">Posts : {{ $user->posts->count() }}</p>
                        <a href="{{ route('user', $user->id) }}">See more user >> </a>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>


@endsection
