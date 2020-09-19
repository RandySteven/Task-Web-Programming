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
        <!-- Button trigger modal -->
        <button type="button" class="btn btn-success mb-3" data-toggle="modal" data-target="#exampleModal">
            <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-envelope-open" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                <path fill-rule="evenodd" d="M8.47 1.318a1 1 0 0 0-.94 0l-6 3.2A1 1 0 0 0 1 5.4v.818l5.724 3.465L8 8.917l1.276.766L15 6.218V5.4a1 1 0 0 0-.53-.882l-6-3.2zM15 7.388l-4.754 2.877L15 13.117v-5.73zm-.035 6.874L8 10.083l-6.965 4.18A1 1 0 0 0 2 15h12a1 1 0 0 0 .965-.738zM1 13.117l4.754-2.852L1 7.387v5.73zM7.059.435a2 2 0 0 1 1.882 0l6 3.2A2 2 0 0 1 16 5.4V14a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2V5.4a2 2 0 0 1 1.059-1.765l6-3.2z"/>
            </svg>
            Subscribe
        </button>
        </div>
        @if ($post->thumbnail)
            <img src="{{ $post->takeImage }}" alt="thumbnail" class="img-thumbnail">
        @endif

        <!-- Modal -->
        <div class="modal fade" id="exampleModal" style="color: black" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel" >Share with</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                </div>
                <div class="modal-body">
                Share with
                    <form action="{{ route('post.email') }}" method="POST">
                        @csrf
                        <div class="form-group">
                            <input type="text" name="mail" id="" placeholder="email@email.com" class="form-control">
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                <button type="button" class="btn btn-danger" data-dismiss="modal">Cancel</button>
                <button type="button" class="btn btn-primary">
                    <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-envelope-open" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                        <path fill-rule="evenodd" d="M8.47 1.318a1 1 0 0 0-.94 0l-6 3.2A1 1 0 0 0 1 5.4v.818l5.724 3.465L8 8.917l1.276.766L15 6.218V5.4a1 1 0 0 0-.53-.882l-6-3.2zM15 7.388l-4.754 2.877L15 13.117v-5.73zm-.035 6.874L8 10.083l-6.965 4.18A1 1 0 0 0 2 15h12a1 1 0 0 0 .965-.738zM1 13.117l4.754-2.852L1 7.387v5.73zM7.059.435a2 2 0 0 1 1.882 0l6 3.2A2 2 0 0 1 16 5.4V14a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2V5.4a2 2 0 0 1 1.059-1.765l6-3.2z"/>
                    </svg>
                    Share
                </button>
                </div>
            </div>
            </div>
        </div>

    </div>

    <div class="container my-2">
        Created by &middot;<a href="{{ route('user', $post->author->id) }}"><strong>{{ $post->author->name }}</strong><br></a>
        <div class="text-secondary">

            {{ $post->created_at->format("d M, Y") }}
            {{ $post->category->name }}
        </div>
        @guest

        @else
            @if (auth()->user()->id == $post->user_id)
                @include('post.file.create', ['post'=>$post])
            @endif
        @endguest
      <p>{!! nl2br($post->body) !!}</p>

      @foreach ($post->files as $file)
          @if ($file->photo)
              <img src="{{ asset('/storage/'.$file->photo) }}" alt="" style="width: 18rem; height: 18rem">
          @endif
      @endforeach

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
            @foreach ($posts as $post)
            <div class="col-lg-4">
                <div class="card" style="width: 18rem;">
                    <img class="card-img-top" src="{{ $post->takeImage }}" alt="{{ "thumbnail-" }}" style="height: 12rem;">
                    <div class="card-body">
                      <h5 class="card-title">{{ $post->title }}</h5>
                      <p class="card-text">{{ Str::limit($post->body, 120, '...') }}</p>
                      <a href="{{ route('post.show', $post->slug) }}" class="btn btn-primary">Check this website</a>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>

    <div class="container mt-5 py-2"  style="background-color: #2A2728;">
        <h5>{{ $post->comments->count() }} Comments</h5>
        @include('post.comments.comment-form', ['comments'=>$post->comments, 'post_id'=>$post->id])
    </div>

        <!-- Write your comment -->
        @guest
        To comment you must <a href="{{ route('login') }}">login</a> or <a href="{{ route('register') }}">register</a> first
        @else
            <div class="container my-4">
                <img src="{{ $post->author->gravatar() }}" alt="" class="rounded-circle mb-2" width="30" height="30">
                <strong>{{ auth()->user()->name }}</strong>
                <form action="{{ route('store.comment') }}" method="POST">
                    @csrf
                    <input type="hidden" name="post_id" value="{{ $post->id }}">
                    <textarea name="comment" id="" class="form-control bg-muted" rows="10" placeholder="Write your comment ..."></textarea>
                    <button type="submit" class="btn btn-primary">Submit</button>
                </form>
            </div>
        @endguest
</div>

@endsection
