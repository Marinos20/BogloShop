<tr @if($level > 0) class="table-secondary" @endif>
    <td>{{ $comment->id }}</td>
    <td>{{ $comment->post->title ?? 'Article supprimé' }}</td>
    <td>{{ $comment->author_name ?? 'Anonyme' }}</td>
    <td style="padding-left: {{ $level * 20 }}px;">
        {{ \Illuminate\Support\Str::limit($comment->content, 100) }}
    </td>
    <td>
        @if($comment->is_approved)
            <span class="badge bg-success">Validé</span>
        @else
            <span class="badge bg-warning text-dark">En attente</span>
        @endif
    </td>
    <td>{{ $comment->created_at->format('d/m/Y H:i') }}</td>
    <td class="text-center">
        {{-- Bouton pour approuver/désapprouver --}}
        <button wire:click="toggleApproval({{ $comment->id }})" class="btn btn-sm btn-info">
            @if($comment->is_approved)
                Retirer validation
            @else
                Valider
            @endif
        </button>

        {{-- Bouton pour supprimer --}}
        <button wire:click="confirmDelete({{ $comment->id }})" data-bs-toggle="modal" data-bs-target="#deleteModal" class="btn btn-sm btn-danger">
            Supprimer
        </button>
    </td>
</tr>

{{-- Affiche les réponses récursivement --}}
@if($comment->replies)
    @foreach($comment->replies as $reply)
        @include('livewire.admin.comments.comment_row', ['comment' => $reply, 'level' => $level + 1])
    @endforeach
@endif
