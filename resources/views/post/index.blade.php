@extends('layouts.app')

@section('title', 'Media Post')

@section('style')

@endsection

@section('content')
<div class="container  my-2 text-center">
<img src="images/large-removebg-preview-removebg-preview.png"  style="background-color: black;" alt="logo">
</div>
<div class="container my-4">
  <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
    <ol class="carousel-indicators">
      <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
      <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
    </ol>
    <div class="carousel-inner">
      <div class="carousel-item active">
        <img src="{{ asset('images/200503051913-15-ju.jpg') }}" class="d-block w-100" alt="...">
      </div>
      <div class="carousel-item">
        <img src="{{ asset('images/traveloka_logo.jpg') }}" class="d-block w-100" alt="...">
      </div>
    </div>
    <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
      <span class="carousel-control-prev-icon" aria-hidden="true"></span>
      <span class="sr-only">Previous</span>
    </a>
    <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
      <span class="carousel-control-next-icon" aria-hidden="true"></span>
      <span class="sr-only">Next</span>
    </a>
  </div>
</div>

<div class="container">
    {{-- @if (session()->has('success'))
        <div class="container alert-success">
            {{ session() }}
        </div>
    @endif --}}
  <div>
    <div class="float-right mb-4">
        @if (Auth::user())
            <a href="{{ route('post.create') }}" class="btn btn-success">Add Post +</a>
        @else
            You need to <a href="{{ route('login') }}">login</a> first to create the post
        @endif
    </div>
    <h1>Media Post</h1>
    Total posts : <strong>{{ $post_counts }}</strong>
    <form action="{{ route('search') }}" method="get">
        @csrf
        <div class="input-group">
            <input type="text" name="query" class="form-control" id="" placeholder="Search by title">
            <div class="input-group-prepend">
                <span class="input-group-text" id="basic-addon1">
                    <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-search" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                        <path fill-rule="evenodd" d="M10.442 10.442a1 1 0 0 1 1.415 0l3.85 3.85a1 1 0 0 1-1.414 1.415l-3.85-3.85a1 1 0 0 1 0-1.415z"/>
                        <path fill-rule="evenodd" d="M6.5 12a5.5 5.5 0 1 0 0-11 5.5 5.5 0 0 0 0 11zM13 6.5a6.5 6.5 0 1 1-13 0 6.5 6.5 0 0 1 13 0z"/>
                    </svg>
                </span>
            </div>
        </div>
    </form>
  </div>
  <table class="table table-dark text-white table-hover">
      <thead>
        <tr>
          <th scope="col">Image</th>
          <th scope="col">Judul</th>
          <th scope="col">Isi</th>
          <th scope="col">Action</th>
        </tr>
      </thead>
      <tbody>
        @forelse ($posts as $post)
        <tr class="border border-white my-4 rounded">
            <td>
                <img src="{{ $post->takeImage }}" style="width:250px;height:250px" alt="{{ "thumbnail-" }}">
                Created by : <strong>{{ $post->user->name }}</strong>
            </td>
            <td>
              <strong>
                {{ $post->title }}
              </strong>
            </td>
            <td>
              <p>
                {{ Str::limit($post->body, 250, '...') }}
                <a href="{{ route('post.show', $post->slug) }}">Read more</a>
              </p>
            </td>

            <td>
              <a href="{{ route('post.edit', $post->slug) }}" class="btn btn-success  mb-3 mb-3">Edit</a>
              <form action="{{ route('post.delete', $post->slug) }}" method="post">
                  @csrf
                  @method('DELETE')
                  <button class="btn btn-danger">Delete</button>
              </form>
            </td>
          </tr>
        @empty
          No data
        @endforelse

      </tbody>
    </table>

    <div class="container">
        {{ $posts->links() }}
    </div>
@endsection
