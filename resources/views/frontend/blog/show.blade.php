@extends('layouts.app')

@section('pageTitle')
    {{ $post->meta_title }}
@endsection

@section('meta_keyword')
    {{ $post->meta_keyword }}
@endsection

@section('meta_description')
    {{ $post->meta_description }}
@endsection

@section('content')
<section class="tp-blog-single-area pt-110 pb-120">
    <div class="container">

        <!-- Titre général -->
        <div class="row">
            <div class="col-xl-12">
                <div class="tp-section-title-wrapper-2 mb-50 text-center">
                    <span class="tp-section-title-pre-2">
                        Découvrez notre Blog
                        <svg width="82" height="22" ...>...</svg>
                    </span>
                    <h3 class="tp-section-title-2">{{ $post->title }}</h3>
                </div>
            </div>
        </div>

        <div class="row">
            <!-- Contenu principal -->
            <div class="col-xl-8 col-lg-8">
                <div class="tp-product-item-2 shadow-sm p-4 rounded mb-4">
                    <div class="tp-blog-thumb-2 p-relative fix mb-30">
                        <img src="{{ asset('storage/uploads/blog/' . $post->thumbnail) }}" 
                             class="img-fluid rounded" 
                             alt="{{ $post->title }}"
                             style="max-width:100%; max-height:400px; object-fit:cover;">
                        <div class="tp-blog-meta-date-2">
                            <span>{{ $post->published_at ? $post->published_at->format('d M, Y') : '' }}</span>
                        </div>
                    </div>
                    <div class="tp-blog-content">
                        <div class="tp-blog-meta mb-20">
                            Publié le : {{ $post->published_at ? $post->published_at->format('d M, Y') : '' }} |
                            Catégorie : {{ $post->category->name ?? 'Uncategorized' }} |
                            Extrait : {{ $post->excerpt }}
                        </div>
                        <div class="tp-blog-description">
                            {!! nl2br(e($post->content)) !!}
                        </div>
                    </div>
                </div>

                <!-- Section Commentaires -->
                <div class="blog-comments mt-5">
                    <h4>{{ $post->comments()->where('is_approved', true)->count() }} Commentaire(s)</h4>

                    <!-- Liste des commentaires racines -->
                    @foreach ($post->comments()->whereNull('parent_id')->where('is_approved', true)->latest()->get() as $comment)
                        <div class="comment mb-3 ps-3 border-start">
                            <p><strong>{{ $comment->author_name }}</strong> 
                               <small class="text-muted">{{ $comment->created_at->diffForHumans() }}</small>
                            </p>
                            <p>{{ $comment->content }}</p>

                            <!-- Affichage des réponses -->
                            @foreach ($comment->replies()->where('is_approved', true)->latest()->get() as $reply)
                                <div class="reply mb-2 ps-4 border-start">
                                    <p><strong>{{ $reply->author_name }}</strong> 
                                       <small class="text-muted">{{ $reply->created_at->diffForHumans() }}</small>
                                    </p>
                                    <p>{{ $reply->content }}</p>
                                </div>
                            @endforeach

                            @auth
                                <!-- Formulaire pour répondre -->
                                <a href="#" class="text-primary small reply-toggle" data-comment="{{ $comment->id }}">Répondre</a>
                                <form action="{{ route('frontend.comments.store', $post->id) }}" method="POST" 
                                      class="reply-form mt-2 d-none" id="reply-form-{{ $comment->id }}">
                                    @csrf
                                    <input type="hidden" name="parent_id" value="{{ $comment->id }}">
                                    <input type="hidden" name="author_name" value="{{ auth()->user()->name }}">
                                    <input type="hidden" name="author_email" value="{{ auth()->user()->email }}">
                                    <textarea name="content" rows="2" class="form-control mb-2" 
                                              placeholder="Votre réponse..." required></textarea>
                                    <button type="submit" class="btn btn-sm btn-primary">Envoyer</button>
                                </form>
                            @else
                                <p class="text-muted small">Vous devez <a href="{{ route('login') }}">vous connecter</a> pour répondre.</p>
                            @endauth
                        </div>
                    @endforeach

                    <!-- Formulaire pour nouveau commentaire -->
                    @auth
                        <div class="new-comment mt-4">
                            <h5>Ajouter un commentaire</h5>
                            <form action="{{ route('frontend.comments.store', $post->id) }}" method="POST">
                                @csrf
                                <input type="hidden" name="author_name" value="{{ auth()->user()->name }}">
                                <input type="hidden" name="author_email" value="{{ auth()->user()->email }}">
                                <textarea name="content" rows="4" class="form-control mb-2" 
                                          placeholder="Votre commentaire..." required></textarea>
                                <button type="submit" class="btn btn-primary">Envoyer</button>
                            </form>
                        </div>
                    @else
                        <p class="text-muted mt-3">Vous devez <a href="{{ route('login') }}">vous connecter</a> pour commenter.</p>
                    @endauth
                </div>
            </div>

            <!-- Sidebar -->
            <div class="col-xl-4 col-lg-4">
                <div class="tp-blog-sidebar">
                    <h4 class="tp-section-title-2 mb-4">Articles récents</h4>
                    <ul class="list-unstyled">
                        @foreach($recentPosts as $recent)
                            <li class="recent-article mb-3">
                                <a href="{{ route('blog.show', $recent->slug) }}" class="d-flex align-items-center text-decoration-none p-2 rounded hover-effect">
                                    <div class="recent-thumb me-3">
                                        <img src="{{ asset('storage/uploads/blog/' . $recent->thumbnail) }}" 
                                             alt="{{ $recent->title }}" 
                                             class="rounded" style="width: 70px; height: 70px; object-fit: cover;">
                                    </div>
                                    <div class="recent-info">
                                        <p class="recent-title mb-1 fw-bold text-dark">{{ $recent->title }}</p>
                                        <small class="text-muted">{{ $recent->category->name ?? 'Uncategorized' }}</small>
                                    </div>
                                </a>
                            </li>
                        @endforeach
                    </ul>
                </div>
            </div>
        </div>

    </div>
</section>

<script>
    // Toggle affichage du formulaire de réponse
    document.querySelectorAll('.reply-toggle').forEach(btn => {
        btn.addEventListener('click', function(e){
            e.preventDefault();
            const id = this.dataset.comment;
            const form = document.getElementById('reply-form-' + id);
            form.classList.toggle('d-none');
        });
    });
</script>

<style>
.comment { border-bottom: 1px solid #ddd; padding-bottom: 1rem; }
.reply { background-color: #f8f9fa; border-left: 2px solid #007bff; padding-left: 1rem; margin-top: 0.5rem; }
.reply-form { margin-top: 0.5rem; }
</style>
@endsection
