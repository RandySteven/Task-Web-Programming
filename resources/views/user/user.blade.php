@extends('layouts.app')

@section('title', $user->name)

@section('content')
<div class="container">
    <div class="container my-2 mx-2">
        <h1>{{ $user->name }}</h1>
        <img src="{{ $user->gravatar() }}" class="rounded-circle" alt="">
        Posts : <strong>{{ $user->posts->count() }}</strong>
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
        @forelse ($user->posts as $post)
        <tr class="border border-white my-4 rounded">
            <td>
                <img src="{{ $post->takeImage }}" style="width:250px;height:250px" alt="{{ "thumbnail-" }}">
            </td>
            <td>
              <strong>
                  {{ $post->title }}
                </strong><br>
                Created by : <strong>{{ $post->author->name }}</strong><br>
                Category : <strong>{{ $post->category->name }}</strong>
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
          You haven't post anything
        @endforelse
        </tbody>
    </table>
</div>
@endsection
