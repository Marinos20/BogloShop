<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <h3>Ajouter des produits
                    <a href="{{ route('product.index') }}" class="btn btn-primary btn-sm float-right">Retour</a>
                </h3>
            </div>
            <div class="card-body">

                @if ($errors->any())
                    <div class="alert alert-warning">
                        @foreach ($errors->all() as $error)
                            <div>{{ $error }}</div>
                        @endforeach
                    </div>
                @endif

                <form wire:submit.prevent="store" enctype="multipart/form-data" method="post">

                    <ul class="nav nav-tabs" id="myTab" role="tablist">
                        <li class="nav-item" role="presentation">
                            <button class="nav-link active" id="images-tab" data-bs-toggle="tab"
                                data-bs-target="#images-tab-pane" type="button" role="tab"
                                aria-controls="images-tab-pane" aria-selected="true"> Images produits</button>
                        </li>
                        <li class="nav-item" role="presentation">
                            <button class="nav-link" id="product-tab" data-bs-toggle="tab"
                                data-bs-target="#product-tab-pane" type="button" role="tab"
                                aria-controls="product-tab-pane" aria-selected="false">Produits</button>
                        </li>
                        <li class="nav-item" role="presentation">
                            <button class="nav-link" id="details-tab" data-bs-toggle="tab"
                                data-bs-target="#details-tab-pane" type="button" role="tab"
                                aria-controls="details-tab-pane" aria-selected="false">Details</button>
                        </li>
                    </ul>
                    <div class="tab-content" id="myTabContent">

                        {{-- Images --}}
                        <div class="tab-pane fade border p-3 mb-2 show active" id="images-tab-pane" role="tabpanel"
                            aria-labelledby="images-tab" tabindex="0">
                            <div class="mb-3">
                                <label>Téléverser Images Produits</label>
                                <input type="file" wire:model="image" multiple min="2" class="form-control" accept="image/*">
                                @error('image')
                                    <span class="text-sm text-danger"><small>{{ $message }}</small></span>
                                @enderror
                            </div>
                            <div class="row">
                                @if ($image)
                                    @foreach ($image as $singleImage)
                                        <div class="col-md-4">
                                            <img style="width: 100px; height: 100px;" class="img img-thumbnail me-4"
                                                src="{{ $singleImage->temporaryUrl() }}">
                                        </div>
                                    @endforeach
                                @endif
                            </div>
                        </div>

                        {{-- Product --}}
                        <div class="tab-pane fade border p-3 mb-2" id="product-tab-pane" role="tabpanel"
                            aria-labelledby="product-tab" tabindex="0">
                            <div class="mb-3">
                                <label>Category</label>
                                <select wire:model="category_id" class="form-control">
                                    <option value="">Select Categories</option>
                                    @foreach ($categories as $category)
                                        <option value="{{ $category->id }}">{{ $category->name }}</option>
                                    @endforeach
                                </select>
                                @error('category_id')
                                    <span class="text-sm text-danger"><small>{{ $message }}</small></span>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <label> Nom du Produits</label>
                                <input type="text" wire:model="name" class="form-control">
                                @error('name')
                                    <span class="text-sm text-danger"><small>{{ $message }}</small></span>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <label> Petite Description (500 Words)</label>
                                <textarea rows="4" wire:model="small_description" class="form-control"></textarea>
                                @error('small_description')
                                    <span class="text-sm text-danger"><small>{{ $message }}</small></span>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <label> Description</label>
                                <textarea rows="4" wire:model="description" class="form-control"></textarea>
                                @error('description')
                                    <span class="text-sm text-danger"><small>{{ $message }}</small></span>
                                @enderror
                            </div>
                        </div>

                        {{-- Details --}}
                        <div class="tab-pane fade border p-3 mb-2" id="details-tab-pane" role="tabpanel"
                            aria-labelledby="details-tab" tabindex="0">
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="mb-3">
                                        <label>Original Price</label>
                                        <input type="text" wire:model="original_price" class="form-control">
                                        @error('original_price')
                                            <span class="text-sm text-danger"><small>{{ $message }}</small></span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="mb-3">
                                        <label>Prix de vente</label>
                                        <input type="text" wire:model="selling_price" class="form-control">
                                        @error('selling_price')
                                            <span class="text-sm text-danger"><small>{{ $message }}</small></span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="mb-3">
                                        <label>Quantité</label>
                                        <input type="number" wire:model="quantity" class="form-control">
                                        @error('quantity')
                                            <span class="text-sm text-danger"><small>{{ $message }}</small></span>
                                        @enderror
                                    </div>
                                </div>

                                {{-- Dates période de vente --}}
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label>Date de début de la période de vente</label>
                                        <input type="datetime-local" wire:model="sale_starts_at" class="form-control">
                                        @error('sale_starts_at')
                                            <span class="text-sm text-danger"><small>{{ $message }}</small></span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label>Date de fin de la période de vente</label>
                                        <input type="datetime-local" wire:model="sale_ends_at" class="form-control">
                                        @error('sale_ends_at')
                                            <span class="text-sm text-danger"><small>{{ $message }}</small></span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="col-md-4">
                                    <div class="mb-3">
                                        <label>Tendance</label><br>
                                        <input type="checkbox" wire:model="trending"
                                            style="width: 50px; height: 50px;">
                                        @error('trending')
                                            <span class="text-sm text-danger"><small>{{ $message }}</small></span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="col-md-4">
                                    <div class="mb-3">
                                        <label>Status</label><br>
                                        <input type="checkbox" wire:model="status"
                                            style="width: 50px; height: 50px;">
                                        @error('status')
                                            <span class="text-sm text-danger"><small>{{ $message }}</small></span>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            <div class="row border p-3">
                                <h4>Type: </h4>

                                <div class="col-md-2">
                                    <input type="radio" id="men" wire:model="type" value="men">
                                    <label for="men">Hommes</label>
                                </div>
                                <div class="col-md-2">
                                    <input type="radio" id="women" wire:model="type" value="Femme">
                                    <label for="women">Femme</label>
                                </div>
                                <div class="col-md-2">
                                    <input type="radio" id="kid" wire:model="type" value="kid">
                                    <label for="kid">Enfant</label>
                                </div>
                                <div class="col-md-2">
                                    <input type="radio" id="Unisex" wire:model="type" value="Unisex">
                                    <label for="Unisex">Unisexe</label>
                                </div>
                            </div>

                            <div class="row border p-3">
                                <h4>Matériel: </h4>

                                <div class="col-md-2">
                                    <input type="radio" id="Leather" wire:model="material" value="Leather">
                                    <label for="Leather">Traditionnel</label>
                                </div>
                                <div class="col-md-2">
                                    <input type="radio" id="Synthetic" wire:model="material" value="Synthetic">
                                    <label for="Synthetic">Pur Naturel</label>
                                </div>
                                <div class="col-md-2">
                                    <input type="radio" id="Suede" wire:model="material" value="Suede">
                                    <label for="Suede">Mixte</label>
                                </div>
                                <div class="col-md-2">
                                    <input type="radio" id="Canvas" wire:model="material" value="Canvas">
                                    <label for="Canvas">Importé</label>
                                </div>
                            </div>

                            <div class="row border p-3">
                                <h4>Style: </h4>

                                <div class="col-md-2">
                                    <input type="radio" id="Classic" wire:model="style" value="Classic">
                                    <label for="Classic">Classic</label>
                                </div>

                                <div class="col-md-2">
                                    <input type="radio" id="Modern" wire:model="style" value="Modern">
                                    <label for="Modern">Modern</label>
                                </div>
                                <div class="col-md-2">
                                    <input type="radio" id="Trendy" wire:model="style" value="Trendy">
                                    <label for="Trendy">Trendy</label>
                                </div>
                                <div class="col-md-2">
                                    <input type="radio" id="Sporty" wire:model="style" value="Sporty">
                                    <label for="Sporty">Elegente</label>
                                </div>
                            </div>
                            <div class="row border p-3">
                                <h4>Couleur: </h4>

                                @forelse ($colors as $color)
                                    <div class="col-md-1">
                                        <input type="checkbox" wire:model="color" value="{{ $color->id }}">
                                        {{ $color->name }} <br>
                                    </div>
                                @empty
                                    <div class="col-md-12">
                                        <h1>No Colors found</h1>
                                    </div>
                                @endforelse
                            </div>
                            <div class="row border p-3">
                                <h4>Tailles: </h4>

                                                    @php
                        function toRoman($number) {
                            $map = [
                                10 => 'X',
                                9 => 'IX',
                                8 => 'VIII',
                                7 => 'VII',
                                6 => 'VI',
                                5 => 'V',
                                4 => 'IV',
                                3 => 'III',
                                2 => 'II',
                                1 => 'I'
                            ];

                            $result = '';
                            foreach ($map as $arabic => $roman) {
                                while ($number >= $arabic) {
                                    $result .= $roman;
                                    $number -= $arabic;
                                }
                            }
                            return $result;
                        }
                        @endphp

                        @for ($size = 1; $size <= 10; $size++)
                            <div class="col-md-1">
                                <input style="width: 20px; height: 20px;" type="checkbox" wire:model="size" value="{{ $size }}">
                                {{ toRoman($size) }}
                            </div>
                        @endfor

                            </div>
                        </div>
                    </div>
                    <div>
                        <div>
                            <button wire:loading.remove wire:target="store" class="btn btn-primary float-right"
                                type="submit">
                                Enregistrer le produit
                            </button>
                            <button wire:loading wire:target="store" disabled
                                class="btn btn-info btn-icon-text float-right"></i>Enregistrer le produit<i
                                    class="mdi mdi-loading mdi-spin btn-icon-prepend"></i></button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
