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
                        <svg width="82" height="22" viewBox="0 0 82 22" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M81 14.5798C0.890564 -8.05914 -5.81154 0.0503902 5.00322 21" stroke="currentColor" stroke-opacity="0.3" stroke-width="2" stroke-miterlimit="3.8637" stroke-linecap="round"/>
                        </svg>
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
            </div>

            <!-- Sidebar -->
            <div class="col-xl-4 col-lg-4">
                <div class="tp-blog-sidebar">
                    <h4 class="tp-section-title-2 mb-4">Articles récents</h4>
                    <ul class="list-unstyled">
                        @foreach($recentPosts as $recent)
                            <li class="recent-article mb-3">
                                <a href="{{ route('blog.show', $recent->slug) }}" class="d-flex align-items-center text-decoration-none p-2 rounded hover-effect">
                                    <!-- Miniature -->
                                    <div class="recent-thumb me-3">
                                        <img src="{{ asset('storage/uploads/blog/' . $recent->thumbnail) }}" 
                                             alt="{{ $recent->title }}" 
                                             class="rounded" style="width: 70px; height: 70px; object-fit: cover;">
                                    </div>
                                    <!-- Titre + catégorie -->
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

<style>
.tp-blog-sidebar h4.tp-section-title-2 {
    font-size: 1.3rem;
    margin-bottom: 1rem;
    color: #222;
}

.recent-article a.hover-effect {
    display: flex;
    align-items: center;
    transition: all 0.3s ease;
    background-color: #f8f9fa;
}

.recent-article a.hover-effect:hover {
    background-color: #e9ecef;
    transform: translateX(3px);
}

.recent-thumb img {
    border-radius: 8px;
    box-shadow: 0 2px 6px rgba(0,0,0,0.1);
}

.recent-info .recent-title {
    font-size: 1rem;
    line-height: 1.2;
}

.recent-info small {
    font-size: 0.8rem;
    color: #6c757d;
}
</style>
@endsection
