<form action="{{ route('store.file') }}" method="post" enctype="multipart/form-data">
    @csrf
    Photo
    <input type="file" name="photo" class="form-control" id="" placeholder="photo">
    <input type="hidden" name="post_id" class="form-control" id="" value="{{ $post->id }}">
    <button type="submit" class="btn btn-success">Submit</button>
</form>
