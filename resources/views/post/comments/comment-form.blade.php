@foreach ($comments as $comment)
    <div class="display-comment-ml-4">
        <!-- Display comment -->
        <div >
            <img src="{{ $comment->user->gravatar() }}" alt="gravatar" class="rounded-circle" width="30" height="30">
            <strong>{{ $comment->user->name }}</strong>
            <p>{!! nl2br($comment->comment) !!}</p>

            <form action="{{ route('store.reply') }}" method="post">
                @csrf
                <input type="hidden" name="post_id" value="{{ $post_id }}">
                <input type="hidden" name="comment_id" value="{{ $comment->id }}">
                <input type="text" name="comment" id="" class="form-control" placeholder="Reply to {{ $comment->user->name }}">
                <button type="submit" class="btn btn-primary my-2">Reply</button>
            </form>
            <div class="ml-3">
                @include('post.comments.comment-form', ['comments' => $comment->replies])
            </div>
        </div>
    </div>
@endforeach
