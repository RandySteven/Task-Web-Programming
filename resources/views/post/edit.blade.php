@extends('layouts.app')

@section('title', 'Edit Post')

@section('content')
<div class="container my-4 border">

<h3 class="text-center"><strong>Edit</strong></h3>
<form action="{{ route('post.update', $post->slug) }}" method="POST" enctype="multipart/form-data">
    @csrf
    @method('PATCH')
    <div class="form-group">
        <label for="">Judul</label>
        <input type="text" class="form-control bg-dark text-white" name="title" value="{{ old('title') ?? $post->title }}">
    </div>

    <div class="form-group">
        <label for="">Isi Artikel</label>
        <textarea name="body" id="" class="form-control bg-dark text-white" rows="10">{{ old('body') ?? $post->body }}</textarea>
    </div>

    <div class="form-group">
        <label for="">Gambar</label>
        <input type="file" name="thumbnail" class="form-control bg-dark text-white">
    </div>

    <div class="form-group">
        <label for="">Category</label>
        <select name="category" class="form-control" id="">
            <option disabled selected>Choose one</option>
            @foreach ($categories as $category)
                <option value="{{ $category->id }}" {{ $category->id == $post->category_id ? "selected" : '' }}>{{ $category->name }}</option>
            @endforeach
        </select>
        <div class="text text-danger">
            @error('category')
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

