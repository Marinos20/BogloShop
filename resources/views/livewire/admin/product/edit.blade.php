<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <h3>Editer Produits
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

                @include('layouts.inc.admin.flash-message')

                <form wire:submit.prevent="update" enctype="multipart/form-data" method="post">

                    <ul class="nav nav-tabs" id="myTab" role="tablist">
                        <li class="nav-item" role="presentation">
                            <button class="nav-link active" id="images-tab" data-bs-toggle="tab"
                                data-bs-target="#images-tab-pane" type="button" role="tab"
                                aria-controls="images-tab-pane" aria-selected="true">Images du Produits</button>
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
                        <li class="nav-item" role="presentation">
                            <button class="nav-link" id="colors-tab" data-bs-toggle="tab"
                                data-bs-target="#colors-tab-pane" type="button" role="tab"
                                aria-controls="colors-tab-pane" aria-selected="false">Couleur du Produit</button>
                        </li>
                        <li class="nav-item" role="presentation">
                            <button class="nav-link" id="size-tab" data-bs-toggle="tab"
                                data-bs-target="#size-tab-pane" type="button" role="tab"
                                aria-controls="size-tab-pane" aria-selected="false">Taille du Produit</button>
                        </li>
                    </ul>
                    <div class="tab-content" id="myTabContent">

                        {{-- Images --}}
                        <div class="tab-pane fade border p-3 mb-2 show active" id="images-tab-pane" role="tabpanel"
                            aria-labelledby="images-tab" tabindex="0">
                            <div class="mb-3">
                                <label>Téléverser Images Produits</label>
                                <input type="file" wire:model.live="image" multiple class="form-control">
                                @error('image')
                                    <span class="text-sm text-danger"><small>{{ $message }}</small></span>
                                @enderror
                            </div>
                            @if($product->productImages)
                            <h3>Old Images</h3>
                            <div class="flex">
                                @foreach ($product->productImages as $singleImage)
                                <div class="d-inline-block">
                                        <img style="width: 100px; height: 100px;" class="me-4 d-block border p-1" src="{{ asset('storage/uploads/products/'.$singleImage->image) }}">
                                        <button type="button" wire:click="deleteImage({{ $singleImage }})" style="width: 100px;" class="btn btn-block btn-danger">Delete</button>
                                </div>
                                @endforeach
                            </div>
                            @else
                            <h3>Aucune image ajoutée</h3>
                            @endif
                            <h3>Nouvelles images</h3>
                            <div class="row">
                                @if ($image)
                                    @foreach ($image as $singleImage)
                                        <div class="col-md-4">
                                            <img style="width: 100px; height: 100px;" class="img img-thumbnail me-4" src="{{ $singleImage->temporaryUrl() }}">
                                        </div>
                                    @endforeach
                                @endif
                            </div>
                        </div>

                        {{-- Product --}}
                        <div class="tab-pane fade border p-3 mb-2" id="product-tab-pane" role="tabpanel"
                            aria-labelledby="product-tab" tabindex="0">
                            <div class="mb-3">
                                <label>Categories</label>
                                <select wire:model="category_id" class="form-control">
                                    @foreach ($categories as $category)
                                        <option {{ $product->category_id == $category->id ? 'selected' : '' }} value="{{ $category->id }}">{{ $category->name }}</option>
                                    @endforeach
                                </select>
                                @error('category_id')
                                    <span class="text-sm text-danger"><small>{{ $message }}</small></span>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <label>Nom du Produit</label>
                                <input value="{{ $product->name }}" type="text" wire:model="name" class="form-control">
                                @error('name')
                                    <span class="text-sm text-danger"><small>{{ $message }}</small></span>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <label> Brève description (500 mots)</label>
                                <textarea rows="4" wire:model="small_description" class="form-control">{{ $product->small_description }}</textarea>
                                @error('small_description')
                                    <span class="text-sm text-danger"><small>{{ $message }}</small></span>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <label> Description</label>
                                <textarea rows="4" wire:model="description" class="form-control">{{ $product->description }}</textarea>
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
                                        <label>Prix d’origine</label>
                                        <input type="text" value="{{ $product->original_price }}" wire:model="original_price" class="form-control">
                                        @error('original_price')
                                            <span class="text-sm text-danger"><small>{{ $message }}</small></span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="mb-3">
                                        <label>Prix de vente</label>
                                        <input type="text" value="{{ $product->selling_price }}" wire:model="selling_price" class="form-control">
                                        @error('selling_price')
                                            <span class="text-sm text-danger"><small>{{ $message }}</small></span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="mb-3">
                                        <label>Quantité</label>
                                        <input type="number" wire:model="quantity" value="{{ $product->quantity }}" class="form-control">
                                        @error('quantity')
                                            <span class="text-sm text-danger"><small>{{ $message }}</small></span>
                                        @enderror
                                    </div>
                                </div>

                                {{-- Ajout dates période de vente --}}
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label for="sale_starts_at">Date de début de la période de vente</label>
                                        <input
                                            type="datetime-local"
                                            id="sale_starts_at"
                                            wire:model.defer="sale_starts_at"
                                            class="form-control @error('sale_starts_at') is-invalid @enderror"
                                            value="{{ old('sale_starts_at', $sale_starts_at) }}"
                                        >
                                        @error('sale_starts_at')
                                            <span class="text-danger"><small>{{ $message }}</small></span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label for="sale_ends_at">Date de fin de la période de vente</label>
                                        <input
                                            type="datetime-local"
                                            id="sale_ends_at"
                                            wire:model.defer="sale_ends_at"
                                            class="form-control @error('sale_ends_at') is-invalid @enderror"
                                            value="{{ old('sale_ends_at', $sale_ends_at) }}"
                                        >
                                        @error('sale_ends_at')
                                            <span class="text-danger"><small>{{ $message }}</small></span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="col-md-4">
                                    <div class="mb-3">
                                        <label>Tendance</label><br>
                                        <input type="checkbox" wire:model="trending" {{ $product->trending ? 'checked' : '' }}
                                            style="width: 50px; height: 50px;">
                                        @error('trending')
                                            <span class="text-sm text-danger"><small>{{ $message }}</small></span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="col-md-4">
                                    <div class="mb-3">
                                        <label>Status</label><br>
                                        <input type="checkbox" wire:model="status" {{ $product->status ? 'checked' : '' }}
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
                                    <input type="radio" {{ $product->type === "men" ? 'checked' : '' }} id="men" wire:model="type" value="men">
                                    <label for="men">Men</label>
                                </div>
                                <div class="col-md-2">

                                    <input type="radio" {{ $product->type === "women" ? 'checked' : '' }} id="women" wire:model="type" value="women">
                                    <label for="women">Women</label>
                                </div>
                                <div class="col-md-2">

                                    <input type="radio" {{ $product->type === "kids" ? 'checked' : '' }} id="kid" wire:model="type" value="kid">
                                    <label for="kid">Kids</label>
                                </div>
                            </div>

                            <div class="row border p-3">
                                <h4>Material: </h4>

                                <div class="col-md-2">

                                    <input type="radio" {{ $product->material === "Leather" ? 'checked' : '' }} id="Leather" wire:model="material" value="Leather">
                                    <label for="Leather">Traditionnel</label>
                                </div>
                                <div class="col-md-2">

                                    <input type="radio" {{ $product->material === "Synthetic" ? 'checked' : '' }} id="Synthetic" wire:model="material" value="Synthetic">
                                    <label for="Synthetic">Pur Naturel</label>
                                </div>
                                <div class="col-md-2">

                                    <input type="radio" {{ $product->material === "Suede" ? 'checked' : '' }} id="Suede" wire:model="material" value="Suede">
                                    <label for="Suede">Mixte</label>
                                </div>
                                <div class="col-md-2">
                                    <input type="radio" {{ $product->material === "Canvas" ? 'checked' : '' }} id="Canvas" wire:model="material" value="Canvas">
                                    <label for="Canvas">Moderne </label>
                                </div>
                            </div>

                            <div class="row border p-3">
                                <h4>Style: </h4>

                                <div class="col-md-2">

                                    <input type="radio" {{ $product->style === "Classic" ? 'checked' : '' }} id="Classic" wire:model="style" value="Classic">
                                    <label for="Classic">Classic</label>
                                </div>
                                <div class="col-md-2">

                                    <input type="radio" {{ $product->style === "Modern" ? 'checked' : '' }} id="Modern" wire:model="style" value="Modern">
                                    <label for="Modern">Modern</label>
                                </div>
                                <div class="col-md-2">

                                    <input type="radio" {{ $product->style === "Trendy" ? 'checked' : '' }} id="Trendy" wire:model="style" value="Trendy">
                                    <label for="Trendy">Haut Spirituelle</label>
                                </div>
                                <div class="col-md-2">
                                    <input type="radio" {{ $product->style === "Sporty" ? 'checked' : '' }} id="Sporty" wire:model="style" value="Sporty">
                                    <label for="Sporty">Sporty</label>
                                </div>
                            </div>
                        </div>

                        {{-- Colors --}}
                        <div class="tab-pane fade border p-3 mb-2" id="colors-tab-pane" role="tabpanel"
                            aria-labelledby="colors-tab" tabindex="0">
                            <div class="mb-3">
                                <h1>Select Color</h1>
                                <div class="row">
                                    @forelse ($colors as $color)
                                        <div class="col-md-1">
                                            <input type="checkbox" wire:model="color" value="{{ $color->id }}">
                                            {{ $color->name }} <br>
                                        </div>
                                    @empty
                                        <div class="col-md-12">
                                            <h1>Aucune couleur trouvée</h1>
                                        </div>
                                    @endforelse
                                </div>
                            </div>
                            @if ($product->productColors->count() > 0)
                            <div class="table-responsive">
                                <h1>Product Colors</h1>
                                <table class="table table-sm table-bordered">
                                    <thead>
                                        <tr>
                                            <td>Nom de la couleur</td>
                                            <td>Couleur</td>
                                            <td>Supprimer</td>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($product->productColors as $color)
                                        <tr>

                                            <td>{{ $color->color->name ?? $color->id }}</td>
                                            <td><div style="height: 30px; width: 30px; background-color: {{ $color->color->code ?? $color->name }}"></div></td>

                                            <td>
                                                <button type="button" wire:click.prevent="deleteColor({{ $color }})" class="btn btn-danger btn-sm text-white">Supprimer</button>
                                            </td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                            @endif

                        </div>

                        {{-- Size --}}
                        <div class="tab-pane fade border p-3 mb-2" id="size-tab-pane" role="tabpanel"
                            aria-labelledby="size-tab" tabindex="0">
                            <div class="mb-3">
                                <label>Selectionner Taille Produit</label>
                                <div class="row">
                                    @for ($size = 20; $size <= 70; $size++)
                                        @if(!in_array($size, $product->productSizes->pluck('size')->toArray()))
                                            <div class="col-md-1">
                                                <input style="width: 20px; height: 20px;" type="checkbox" wire:model="size" value="{{ $size }}"> {{ $size }}
                                            </div>
                                        @endif
                                    @endfor
                                </div>
                            </div>

                            @if ($product->productSizes->count() > 0)
                            <div class="table-responsive">
                                <h1>Product Size</h1>
                                <table class="table table-sm table-bordered">
                                    <thead>
                                        <tr>
                                            <td>Taille</td>
                                            <td>Supprimer</td>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($product->productSizes as $size)
                                        <tr>
                                            <td>{{ $size->size }}</td>
                                            <td>
                                                <button type="button" wire:click.prevent="deleteSize({{ $size }})" class="btn btn-danger btn-sm text-white">Supprimer</button>
                                            </td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                            @endif
                        </div>

                    </div>
                    <div>
                        <button wire:loading.remove wire:target="update" class="btn btn-primary float-right" type="submit">
                            Enregistrer Produit
                        </button>
                        <button wire:loading wire:target="update" disabled class="btn btn-info btn-icon-text float-right"></i>Enregistrement du produit<i class="mdi mdi-loading mdi-spin btn-icon-prepend"></i></button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
