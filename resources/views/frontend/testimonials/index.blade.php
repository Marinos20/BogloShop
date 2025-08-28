@extends('layouts.admin')

@section('content')
<div class="container-fluid py-4">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h4 class="mb-0">📢 Témoignages</h4>
    </div>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <div class="card shadow">
        <div class="card-body">
            <table class="table table-bordered table-hover align-middle">
                <thead class="table-dark">
                    <tr>
                        <th>#</th>
                        <th>Utilisateur</th>
                        <th>Message</th>
                        <th>Note ⭐</th>
                        <th>Statut</th>
                        <th>Date</th>
                        <th class="text-center">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($testimonials as $testimonial)
                        <tr>
                            <td>{{ $testimonial->id }}</td>
                            <td>{{ $testimonial->user->name ?? 'Anonyme' }}</td>
                            <td>{{ Str::limit($testimonial->message, 60) }}</td>
                            <td>{{ $testimonial->rating }}/5</td>
                            <td>
                                @if($testimonial->is_approved)
                                    <span class="badge bg-success">Validé</span>
                                @else
                                    <span class="badge bg-warning text-dark">En attente</span>
                                @endif
                            </td>
                            <td>{{ $testimonial->created_at->format('d/m/Y') }}</td>
                            <td class="text-center">
                                <a href="{{ route('testimonials.edit', $testimonial) }}" class="btn btn-sm btn-primary">Éditer</a>

                                <form action="{{ route('testimonials.destroy', $testimonial) }}" method="POST" class="d-inline" onsubmit="return confirm('Confirmer la suppression ?')">
                                    @csrf
                                    @method('DELETE')
                                    <button class="btn btn-sm btn-danger">Supprimer</button>
                                </form>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="7" class="text-center">Aucun témoignage trouvé.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
