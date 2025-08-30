<div style="margin-left: {{ $level * 20 }}px;" class="mb-3">
    <strong>{{ $comment->author_name }}</strong> dit :
    <p>{{ $comment->content }}</p>

    @if($comment->replies->count())
        @foreach($comment->replies as $reply)
            @include('livewire.frontend.comments.comment_row', ['comment' => $reply, 'level' => $level + 1])
        @endforeach
    @endif
</div>
