@extends('layouts.app')

@section('title', $post->title)

@section('content')
<div class="container my-2">
    <div class="container bg-light">
        <a href="{{ route('post.index') }}">
        <svg width="3em" height="3em" viewBox="0 0 16 16" class="bi bi-arrow-left-short" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
            <path fill-rule="evenodd" d="M12 8a.5.5 0 0 1-.5.5H5.707l2.147 2.146a.5.5 0 0 1-.708.708l-3-3a.5.5 0 0 1 0-.708l3-3a.5.5 0 1 1 .708.708L5.707 7.5H11.5a.5.5 0 0 1 .5.5z"/>
        </svg>
        </a>
    </div>
    <div class="container">
        <div>
            <h3>{{ $post->title }}</h3>

        </div>
        @if ($post->thumbnail)
            <img src="{{ $post->takeImage }}" alt="thumbnail" class="img-thumbnail">
        @endif
    </div>

    <div class="container my-2">
        <div class="text-secondary">
            Created by &middot;<strong>{{ $post->author }}</strong><br>
            {{ $post->created_at->format("d M, Y") }}
        </div>
      <p>{!! nl2br($post->body) !!}</p>
        <div class="container my-2">
            Share Post dengan :
            <p>
                <a href="https://www.facebook.com/"><img src="{{ asset('images/facebook.png') }}" class="navbar-toggler-icon rounded-circle"  alt=""></a>
                <a href="https://github.com/"><img src="{{ asset('images/github.png') }}" class="navbar-toggler-icon rounded-circle"  alt=""></a>
                <a href="https://www.instagram.com/"><img src="{{ asset('images/logo.png') }}" class="navbar-toggler-icon rounded-circle"  alt=""></a>
                <a href="https://www.youtube.com/"><img src="{{ asset('images/youtube.png') }}" class="navbar-toggler-icon rounded-circle"  alt=""></a>
                <a href="#"><img src="{{ asset('images/twitter.png') }}" class="navbar-toggler-icon rounded-circle"  alt=""></a>
            </p>
        </div>
    </div>

    <div class="container mt-5 text-dark">
        <h4>Rekomendasi untuk anda</h4>
        <div class="row">
            <div class="col-lg-4">
                <div class="card" style="width: 18rem;">
                    <img class="card-img-top" src="{{ asset('images/246x0w.png') }}" alt="Card image cap" style="height: 12rem;">
                    <div class="card-body">
                      <h5 class="card-title">Card title</h5>
                      <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                      <a href="#" class="btn btn-primary">Check this website</a>
                    </div>
                </div>
            </div>
            <div class="col-lg-4">
                <div class="card" style="width: 18rem;">
                    <img class="card-img-top" src="{{ asset('images/200503051913-15-ju.jpg') }}" alt="Card image cap" style="height: 12rem;">
                    <div class="card-body">
                      <h5 class="card-title">Card title</h5>
                      <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                      <a href="#" class="btn btn-primary">Check this website</a>
                    </div>
                </div>
            </div>
            <div class="col-lg-4">
                <div class="card" style="width: 18rem;">
                    <img class="card-img-top" src="{{ asset('images/traveloka_logo.jpg') }}" alt="Card image cap" style="height: 12rem;">
                    <div class="card-body">
                      <h5 class="card-title">Card title</h5>
                      <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                      <a href="#" class="btn btn-primary">Check this website</a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="container mt-5"  style="background-color: #2A2728;">
        <h5>Comments</h5>
        <div class="display-comment-ml-4">
            <!-- Display comment -->
            <div >
                <img src="{{ asset('images/200503051913-15-ju.jpg') }}" alt="gravatar" class="rounded-circle" width="30" height="30">
                <strong>Randy Steven</strong>
                <p>Penjelasan yang masuk akal</p>
            </div>
        </div>
    </div>

        <!-- Write your comment -->
            <div class="container my-4">
                <img src="{{ asset('images/200503051913-15-ju.jpg') }}" alt="" class="rounded-circle mb-2" width="30" height="30">
                <strong>Randy Steven</strong>
                <form action="">
                    <textarea name="" id="" class="form-control bg-muted" rows="10" placeholder="Write your comment ..."></textarea>
                </form>
            </div>
</div>

@endsection
