<div>
    <div wire:ignore.self class="modal fade" id="deleteModal" tabindex="-1" aria-labelledby="deleteModalLabel"
        aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">Suppression du produit</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>

                <form wire:submit="destroy">
                    <div class="modal-body">
                        Êtes-vous sûr de vouloir supprimer ce produit ?
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fermer</button>
                        <button type="submit" class="btn btn-primary">Oui. Supprimer</button>
                    </div>
                </form>

            </div>
        </div>
    </div>

    <div class="m-3">
        @include('layouts.inc.admin.flash-message')
    </div>

    <div class="card-body text-nowrap table-responsive">
        @if ($products->count() > 0)
            <table class="table table-bordered table-striped">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Categorie</th>
                        <th>Produit</th>
                        <th>Prix</th>
                        <th>Quantité</th>
                        <th>En Stock</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($products as $index => $product)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $product->category->name }}</td>
                            <td>{{ $product->name }}</td>
                            <td>{{ $product->selling_price }}</td>
                            <td>{{ $product->quantity }}</td>
                            <td><button wire:click="updateStatus({{ $product->id }})" type="button" class="btn btn-outline-secondary btn-rounded btn-icon">
                                <i class="{{ $product->status  ? "mdi mdi-check-circle text-success" : "mdi mdi-checkbox-blank-circle-outline text-muted" }}"></i>
                            </button>

                            </td>
                            <td>
                                <a class="btn btn-sm btn-dark btn-icon-text"
                                    href="{{ route('product.edit', $product->id) }}">Editer
                                    <i class="mdi mdi-file-check btn-icon-append"></i></a>
                                <a wire:click="deleteProduct({{ $product }})"
                                    class="btn btn-sm btn-danger btn-icon-text" data-bs-toggle="modal"
                                    data-bs-target="#deleteModal"><i
                                        class="mdi mdi-delete btn-icon-append"></i>Supprimer</a>
                            </td>
                        </tr>
                    @endforeach

                </tbody>
            </table>
        @else
            <div class="alert alert-info text-center">
                {{ $none }}
            </div>
        @endif
        {{ $products->links() }}
    </div>
