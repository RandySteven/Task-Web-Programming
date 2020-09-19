@foreach ($comments as $comment)
    <div class="display-comment-ml-4">
        <!-- Display comment -->
        <div >
            {{ $comment->replies->count() }} replies <br>
            <img src="{{ $comment->user->gravatar() }}" alt="gravatar" class="rounded-circle" width="30" height="30">
            <div class="float-right">
                @can('delete', $comment)
                    <form action="{{ route('comment.delete',$comment->id) }}" method="post">
                        @csrf
                        @method('DELETE')
                        <button class="btn btn-dark" >
                            <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-trash" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                <path d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0V6z"/>
                                <path fill-rule="evenodd" d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1v1zM4.118 4L4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4H4.118zM2.5 3V2h11v1h-11z"/>
                            </svg>
                        </button>
                    </form>
                @endcan

            </div>
            <strong>{{ $comment->user->name }}</strong>
            <p>{!! nl2br($comment->comment) !!}</p>

            @guest
            To reply you must <a href="{{ route('login') }}">login</a> or <a href="{{ route('register') }}">register</a> first
            @else
                <form action="{{ route('store.reply') }}" method="post">
                    @csrf
                    <input type="hidden" name="post_id" value="{{ $post_id }}">
                    <input type="hidden" name="comment_id" value="{{ $comment->id }}">
                    <input type="text" name="comment" id="" class="form-control" placeholder="Reply to {{ $comment->user->name }}">
                    <button type="submit" class="btn btn-primary my-2">Reply</button>
                </form>
            @endguest


            <div class="ml-3">
                @include('post.comments.comment-form', ['comments' => $comment->replies])
            </div>
        </div>
    </div>
@endforeach
