@extends('layouts.app')

@section('title', 'Media Post')

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
  <div>
    <div class="float-right mb-4">
      <a href="{{ route('post.create') }}" class="btn btn-success">Add Post +</a>
    </div>
    <h1>Media Post</h1>
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
            <td><img src="{{ $post->takeImage }}" style="width:250px;height:250px" alt=""></td>
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
              <button class="btn btn-danger">Delete</button>
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
