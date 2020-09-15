<form action="{{ route('create.profile') }}" method="post">
    @csrf
    <input type="file" name="profile_picture" class="form-control my-2">
    <textarea name="status" id="" class="form-control my-2" rows="5"></textarea>
    <input type="hidden" name="user_id" value="{{ $user->id }}">
    <button type="submit">Submit</button>
</form>
