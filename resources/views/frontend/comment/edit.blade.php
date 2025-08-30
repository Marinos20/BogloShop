@extends('layouts.admin')

@section('content')
<div class="container-fluid py-4">
    <h4 class="mb-4">✏️ Éditer le commentaire</h4>

    @if(session('success'))
        <div class="alert alert-success text-center">{{ session('success') }}</div>
    @endif

    <div class="card shadow">
        <div class="card-body">
            <form action="{{ route('admin.comments.update', $comment) }}" method="POST">
                @csrf
                @method('PUT')

                {{-- Commentaire --}}
                <div class="mb-3">
                    <label for="message" class="form-label">Commentaire</label>
                    <textarea id="message" name="message" class="form-control" rows="4">{{ old('message', $comment->message) }}</textarea>
                    @error('message') <small class="text-danger">{{ $message }}</small> @enderror
                </div>

                {{-- Statut --}}
                <div class="mb-3 form-check">
                    <input type="checkbox" class="form-check-input" id="is_approved" name="is_approved" value="1" {{ old('is_approved', $comment->is_approved) ? 'checked' : '' }}>
                    <label class="form-check-label" for="is_approved">Approuvé</label>
                </div>

                <button type="submit" class="btn btn-success">💾 Enregistrer</button>
                <a href="{{ route('admin.comments.index') }}" class="btn btn-secondary">Retour</a>
            </form>
        </div>
    </div>
</div>
@endsection
