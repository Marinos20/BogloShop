@extends('layouts.app')

@section('content')
<section class="tp-blog-area pt-110 pb-120">
    <div class="container">
        <div class="row">
            <div class="col-xl-12">
                <div class="tp-section-title-wrapper-2 mb-50 text-center">
                    <span class="tp-section-title-pre-2">
                        Notre Blog & Actualités
                        <svg width="82" height="22">...</svg>
                    </span>
                    <h3 class="tp-section-title-2">Tous les articles</h3>
                </div>
            </div>
        </div>

        <div class="row">
            @forelse ($posts as $post)
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
                            <div class="tp-blog-meta-2">
                                <a href="#">{{ $post->category->name ?? 'Uncategorized' }}</a>
                            </div>
                            <h3 class="tp-blog-title-2">
                                <a href="{{ route('blog.show', $post->slug) }}">{{ $post->title }}</a>
                            </h3>
                        </div>
                    </div>
                </div>
            @empty
                <p class="text-center">Aucun article disponible.</p>
            @endforelse
        </div>

        <!-- Pagination -->
        <div class="row">
            <div class="col-xl-12">
                <div class="d-flex justify-content-center mt-4">
                    {{ $posts->links() }}
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
