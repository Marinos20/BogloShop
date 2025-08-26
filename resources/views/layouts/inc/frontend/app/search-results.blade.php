@extends('layouts.app')

@section('content')
<section class="tp-seller-area pb-140 mt-5 py-5">
    <div class="container">
        <div class="row">
            <div class="col-xl-12">
                <div class="tp-section-title-wrapper-2 mb-50">
                    <span class="tp-section-title-pre-2">
                        Résultats de recherche pour : <strong>{{ $query }}</strong>
                        <svg width="82" height="22" viewBox="0 0 82 22" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M81 14.5798C0.890564 -8.05914 -5.81154 0.0503902 5.00322 21" stroke="currentColor" stroke-opacity="0.3" stroke-width="2" stroke-miterlimit="3.8637" stroke-linecap="round"></path>
                        </svg>
                    </span>
                    <h3 class="tp-section-title-2">Produits trouvés</h3>
                </div>
            </div>
        </div>

        @if($products->count())
        <div class="row">
            @foreach ($products as $product)
                <div class="col-xl-3 col-lg-4 col-md-6 col-6 col-sm-6">
                    <div class="tp-product-item-2 mb-40">
                        <div class="tp-product-thumb-2 p-relative z-index-1 fix w-img">
                            <a href="{{ url('/collection/' . $product->category->slug . '/' . $product->slug) }}">
                                {{-- Affiche la première image si existe sinon image par défaut --}}
                                @if(isset($product->productImages[0]))
                                    <img src="{{ asset('storage/uploads/products/' . $product->productImages[0]->image) }}" alt="{{ $product->name }}" class="default-img">
                                @else
                                    <img src="{{ asset('frontend/img/no-image.png') }}" alt="Pas d'image" class="default-img">
                                @endif
                                {{-- Si tu veux afficher une image au survol (hover) --}}
                                @if(isset($product->productImages[1]))
                                    <img src="{{ asset('storage/uploads/products/' . $product->productImages[1]->image) }}" alt="{{ $product->name }}" class="hover-img">
                                @endif
                            </a>
                        </div>
                        <div class="tp-product-content-2 pt-15">
                            <div class="tp-product-tag-2 text-capitalize">
                                <a href="{{ url('/collection/' . $product->category->slug) }}">{{ $product->category->name }}</a>, {{ $product->type ?? '' }}
                            </div>
                            <h3 class="tp-product-title-2">
                                <a href="{{ url('/collection/' . $product->category->slug . '/' . $product->slug) }}">{{ $product->name }}</a>
                            </h3>
                            <div class="tp-product-rating-icon tp-product-rating-icon-2">
                                {{-- Ici tu peux afficher les étoiles selon une note si tu en as --}}
                                <span><i class="fa-solid fa-star"></i></span>
                                <span><i class="fa-solid fa-star"></i></span>
                                <span><i class="fa-solid fa-star"></i></span>
                                <span><i class="fa-solid fa-star"></i></span>
                                <span><i class="fa-solid fa-star"></i></span>
                            </div>
                            <div class="tp-product-price-wrapper-2">
                                <span class="tp-product-price-2 new-price">
                                    {{ $product->selling_price > 0 
                                        ? number_format($product->selling_price, 0, ',', ' ') . ' $' 
                                        : 'Prix non disponible' }}
                                </span>
                                @if($product->original_price && $product->original_price > $product->selling_price)
                                <span class="tp-product-price-2 old-price">
                                    {{ number_format($product->original_price, 0, ',', ' ') }} $
                                </span>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>

        <div class="row">
            <div class="col-xl-12">
                <div class="tp-seller-more text-center mt-10">
                    <a href="{{ url('/collection') }}" class="tp-btn tp-btn-border tp-btn-border-sm">Voir tous les produits</a>
                </div>
            </div>
        </div>

        <div class="d-flex justify-content-center mt-4">
            {{ $products->appends(['query' => $query])->links() }}
        </div>

        @else
        <div class="alert alert-warning mt-4">
            Aucun produit trouvé pour votre recherche "<strong>{{ $query }}</strong>".
        </div>
        @endif

    </div>
</section>
@endsection
