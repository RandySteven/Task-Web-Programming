@extends('layouts.app')

@section('title', 'Create Post')

@section('content')
<div class="container my-4 border">

<h3 class="text-center"><strong>Create</strong></h3>
<form action="{{ route('post.store') }}" method="POST" autocomplete="off" enctype="multipart/form-data">
    @csrf
    <div class="form-group">
        <label for="">Judul</label>
        <input type="text" class="form-control bg-dark text-white @error('title') is-invalid @enderror" name="title">
        <div class="text text-danger">
            @error('title')
                {{ $message }}
            @enderror
        </div>
    </div>

    <div class="form-group">
        <label for="">Isi Artikel</label>
        <textarea name="body" id="" class="form-control bg-dark text-white @error('body') is-invalid @enderror" rows="10"></textarea>
        <div class="text text-danger">
            @error('body')
                {{ $message }}
            @enderror
        </div>
    </div>

    <div class="form-group">
        <label for="">Gambar</label>
        <input type="file" name="thumbnail" class="form-control bg-dark text-white @error('thumbnail') is-invalid @enderror">
        <div class="text text-danger">
            @error('thumbnail')
                {{ $message }}
            @enderror
        </div>
    </div>

    <div class="form-group">
        <label for="">Nama Penulis</label>
        <input type="text" class="form-control bg-dark text-white @error('author') is-invalid @enderror" name="author">
        <div class="text text-danger">
            @error('author')
                {{ $message }}
            @enderror
        </div>
    </div>

    <div class="container mx-auto">
      <button type="submit" class="btn btn-primary mb-1 text-center">Submit</button>
    </div>
</form>
</div>
@endsection

