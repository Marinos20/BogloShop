<section class="tp-search-area tp-search-style-secondary py-4">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-8 col-md-10 col-sm-12">
                <div class="tp-search-form p-4 rounded shadow-sm bg-white">
                    <!-- Bouton de fermeture -->
                    <div class="tp-search-close text-end mb-3">
                        <button class="tp-search-close-btn btn btn-sm btn-outline-secondary">
                            <i class="fas fa-times"></i>
                        </button>
                    </div>

                    <!-- Champ de recherche -->
                    <div class="tp-search-input d-flex mb-3">
                        <input type="text" class="form-control me-2" placeholder="Rechercher un produit..." wire:model.debounce.500ms="search">
                        <button type="button" class="btn btn-primary">
                            <i class="flaticon-search-1"></i>
                        </button>
                    </div>

                    <!-- Tags suggérés -->
                    <div class="tp-search-category mb-4">
                        <span class="fw-bold me-2">Rechercher par :</span>
                        @foreach(['Chance', 'Attraction', 'Bague', 'Protection', 'Parfums'] as $tag)
                            <a href="#" class="me-2 text-decoration-underline text-primary" wire:click.prevent="setSearchTag('{{ $tag }}')">{{ $tag }}</a>
                        @endforeach
                    </div>

                    <!-- Résultats -->
                    <div>
                        @if(!empty($search))
                            @if($products->count())
                                <ul class="list-group">
                                    @foreach($products as $product)
                                        <li class="list-group-item">
                                            <a href="{{ route('product.show', $product->slug) }}" class="text-decoration-none text-dark">
                                                {{ $product->name }}
                                            </a>
                                        </li>
                                    @endforeach
                                </ul>
                            @else
                                <p class="text-danger">Aucun produit trouvé.</p>
                            @endif
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
