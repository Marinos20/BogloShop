<section class="tp-blog-area pt-110 pb-120">
    <div class="container">
        <div class="row">
            <div class="col-xl-12">
                <div class="tp-section-title-wrapper-2 mb-50 text-center">
                    <span class="tp-section-title-pre-2">
                        Notre Blog & Actualités
                        <svg width="82" height="22" ...>...</svg>
                    </span>
                    <h3 class="tp-section-title-2">Dernières nouvelles et articles</h3>
                </div>
            </div>
        </div>

        <div class="row">
            @foreach ($posts as $post)
                <div class="col-xl-4 col-lg-4 col-md-6">
                    <div class="tp-blog-item-2 mb-40">
                        <div class="tp-blog-thumb-2 p-relative fix">
                            <a href="{{ route('blog.show', $post->slug) }}">
                                <img src="{{ asset('storage/uploads/blog/' . $post->thumbnail) }}" alt="{{ $post->title }}">
                            </a>
                            <div class="tp-blog-meta-date-2">
                                <span>{{ $post->published_at ? $post->published_at->format('d M, Y') : '' }}</span>
                            </div>
                        </div>
                        <div class="tp-blog-content-2 has-thumbnail">
                            <div class="tp-blog-meta-2 d-flex align-items-center">
                                <span>
                                    <svg width="14" height="14" ...>...</svg>
                                </span>
                                <a href="#"> {{ $post->category->name ?? 'Uncategorized' }} </a>

                                {{-- Ajout compteur de commentaires --}}
                                @if($post->comments_count > 0)
                                    <span class="ms-3 comments-count" title="{{ $post->comments_count }} commentaire(s)">
                                        💬 {{ $post->comments_count }}
                                    </span>
                                @endif
                            </div>
                            <h3 class="tp-blog-title-2">
                                <a href="{{ route('blog.show', $post->slug) }}">
                                    {{ \Illuminate\Support\Str::limit($post->title, 12, '...') }}
                                </a>
                            </h3>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>

        <div class="row">
            <div class="col-xl-12">
                <div class="tp-blog-more-2 mt-10 text-center">
                    <a href="{{ route('blog.index') }}" class="tp-btn tp-btn-border tp-btn-border-sm">Discover More</a>
                </div>
            </div>
        </div>
    </div>
</section>

<style>
/* Tronquer les titres trop longs sur 2 lignes avec ... */
.tp-blog-title-2 a {
    display: -webkit-box;
    -webkit-line-clamp: 2; /* nombre de lignes max */
    -webkit-box-orient: vertical;
    overflow: hidden;
    text-overflow: ellipsis;
}

.comments-count {
    font-size: 0.9rem;
    color: #555;
    display: inline-flex;
    align-items: center;
}
</style>
