<div class="container-fluid py-4">

    @if(session('success'))
        <div class="alert alert-success text-center">{{ session('success') }}</div>
    @endif

    <div class="card shadow">
        <div class="card-body">
            <div class="mb-3">
                <label for="message" class="form-label">Message</label>
                <textarea id="message" class="form-control" rows="4" wire:model.defer="message"></textarea>
                @error('message') <small class="text-danger">{{ $message }}</small> @enderror
            </div>

            <div class="mb-3">
                <label for="rating" class="form-label">Note ⭐</label>
                <select id="rating" class="form-control" wire:model.defer="rating">
                    @for($i=1; $i<=5; $i++)
                        <option value="{{ $i }}">{{ $i }} étoiles</option>
                    @endfor
                </select>
                @error('rating') <small class="text-danger">{{ $message }}</small> @enderror
            </div>

            <div class="form-check mb-3">
                <input type="checkbox" class="form-check-input" id="is_approved" wire:model.defer="is_approved">
                <label class="form-check-label" for="is_approved">Approuvé</label>
            </div>

            <button class="btn btn-success" wire:click="save">💾 Enregistrer</button>
            <button class="btn btn-danger" wire:click="confirmDelete">🗑️ Supprimer</button>

            @if($confirmingTestimonialDeletion)
                <div class="alert alert-warning mt-3 text-center">
                    <p>⚠️ Êtes-vous sûr de vouloir supprimer ce témoignage ?</p>
                    <button class="btn btn-danger btn-sm" wire:click="deleteTestimonial">Oui, Supprimer</button>
                    <button class="btn btn-secondary btn-sm" wire:click="$set('confirmingTestimonialDeletion', false)">Annuler</button>
                </div>
            @endif
        </div>
    </div>
</div>
