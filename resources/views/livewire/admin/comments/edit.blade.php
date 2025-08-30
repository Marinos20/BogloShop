<div class="container-fluid py-4">

    @if(session('success'))
        <div class="alert alert-success text-center">{{ session('success') }}</div>
    @endif

    <div class="card shadow">
        <div class="card-body">
            <div class="mb-3">
                <label for="author_name" class="form-label">Nom de l'auteur</label>
                <input type="text" id="author_name" class="form-control" wire:model.defer="author_name">
                @error('author_name') <small class="text-danger">{{ $message }}</small> @enderror
            </div>

            <div class="mb-3">
                <label for="author_email" class="form-label">Email</label>
                <input type="email" id="author_email" class="form-control" wire:model.defer="author_email">
                @error('author_email') <small class="text-danger">{{ $message }}</small> @enderror
            </div>

            <div class="mb-3">
                <label for="content" class="form-label">Commentaire</label>
                <textarea id="content" class="form-control" rows="4" wire:model.defer="content"></textarea>
                @error('content') <small class="text-danger">{{ $message }}</small> @enderror
            </div>

            <div class="form-check mb-3">
                <input type="checkbox" class="form-check-input" id="is_approved" wire:model.defer="is_approved">
                <label class="form-check-label" for="is_approved">Approuvé</label>
            </div>

            <button class="btn btn-success" wire:click="update">💾 Enregistrer</button>
            <button class="btn btn-danger" wire:click="$set('confirmingCommentDeletion', true)">🗑️ Supprimer</button>

            @if($confirmingCommentDeletion ?? false)
                <div class="alert alert-warning mt-3 text-center">
                    <p>⚠️ Êtes-vous sûr de vouloir supprimer ce commentaire ?</p>
                    <button class="btn btn-danger btn-sm" wire:click="deleteComment">Oui, Supprimer</button>
                    <button class="btn btn-secondary btn-sm" wire:click="$set('confirmingCommentDeletion', false)">Annuler</button>
                </div>
            @endif
        </div>
    </div>
</div>
