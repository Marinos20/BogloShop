@foreach ($comments as $comment)
<div class="comment mb-3 ps-3 border-start">
    <p><strong>{{ $comment->author_name }}</strong> 
       <small class="text-muted">{{ $comment->created_at->diffForHumans() }}</small>
    </p>
    <p>{{ $comment->content }}</p>

    @foreach ($comment->replies()->where('is_approved', true)->latest()->get() as $reply)
        <div class="reply mb-2 ps-4 border-start">
            <p><strong>{{ $reply->author_name }}</strong> 
               <small class="text-muted">{{ $reply->created_at->diffForHumans() }}</small>
            </p>
            <p>{{ $reply->content }}</p>
        </div>
    @endforeach

    @auth
        <a href="#" class="text-primary small reply-toggle" data-comment="{{ $comment->id }}">Répondre</a>
        <form action="{{ route('frontend.comments.store', $comment->post_id) }}" method="POST" 
              class="reply-form mt-2 d-none" id="reply-form-{{ $comment->id }}">
            @csrf
            <input type="hidden" name="parent_id" value="{{ $comment->id }}">
            <input type="hidden" name="author_name" value="{{ auth()->user()->name }}">
            <input type="hidden" name="author_email" value="{{ auth()->user()->email }}">
            <textarea name="content" rows="2" class="form-control mb-2" 
                      placeholder="Votre réponse..." required></textarea>
            <button type="submit" class="btn btn-sm btn-primary">Envoyer</button>
        </form>
    @endauth
</div>
@endforeach
