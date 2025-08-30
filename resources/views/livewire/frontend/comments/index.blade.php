<div class="comments-section">
    <h4>Commentaires ({{ $comments->count() }})</h4>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    {{-- Formulaire d'ajout de commentaire --}}
    <form wire:submit.prevent="addComment">
        <input type="text" wire:model.defer="author_name" placeholder="Nom" class="form-control mb-2">
        <input type="email" wire:model.defer="author_email" placeholder="Email" class="form-control mb-2">
        <textarea wire:model.defer="content" placeholder="Votre commentaire..." class="form-control mb-2"></textarea>
        <button type="submit" class="btn btn-primary">Envoyer</button>
    </form>

    <hr>

    {{-- Affichage récursif des commentaires --}}
    @foreach($comments as $comment)
        @include('livewire.frontend.comments.comment_row', ['comment' => $comment, 'level' => 0])
    @endforeach
</div>
