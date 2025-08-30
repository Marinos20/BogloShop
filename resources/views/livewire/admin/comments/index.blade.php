<div>
    <div class="container-fluid py-4">
        <div class="d-flex justify-content-between align-items-center mb-4">
            <h4 class="mb-0">💬 Commentaires</h4>
        </div>

        {{-- Message de succès --}}
        @if(session('success'))
            <div class="alert alert-success text-center">{{ session('success') }}</div>
        @endif

        <div class="card shadow">
            <div class="card-body table-responsive text-nowrap">
                @if($comments->count() > 0)
                    <table class="table table-bordered table-striped align-middle">
                        <thead class="table-dark">
                            <tr>
                                <th>#</th>
                                <th>Article</th>
                                <th>Auteur</th>
                                <th>Message</th>
                                <th>Statut</th>
                                <th>Date</th>
                                <th class="text-center">Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($comments as $comment)
                                @include('livewire.admin.comments.comment_row', ['comment' => $comment, 'level' => 0])
                            @endforeach
                        </tbody>
                    </table>
                @else
                    <div class="alert alert-info text-center">
                        Aucun commentaire trouvé.
                    </div>
                @endif
            </div>
        </div>
    </div>

    <!-- Modal de confirmation de suppression -->
    <div class="modal fade" id="deleteModal" tabindex="-1" aria-hidden="true" wire:ignore.self>
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Confirmer la suppression</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Fermer"></button>
                </div>
                <div class="modal-body">
                    Êtes-vous sûr de vouloir supprimer ce commentaire ?
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Annuler</button>
                    <button type="button" wire:click="deleteComment" class="btn btn-danger">Supprimer</button>
                </div>
            </div>
        </div>
    </div>
</div>

@push('script')
<script>
    window.addEventListener('close-modal', event => {
        var myModalEl = document.getElementById('deleteModal');
        var modal = bootstrap.Modal.getInstance(myModalEl)
        if(modal) modal.hide();
    });
</script>
@endpush
