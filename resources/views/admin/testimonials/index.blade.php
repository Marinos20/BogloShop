@extends('layouts.admin')

@section('content')
<div class="card-body table-responsive text-nowrap">

    @if (session('success'))
        <div class="alert alert-success text-center">
            {{ session('success') }}
        </div>
    @endif

    @if($testimonials->count() > 0)
        <table class="table table-bordered table-striped">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Utilisateur</th>
                    <th>Message</th>
                    <th>Note</th>
                    <th>Approuvé</th>
                    <th>Date</th>
                    <th class="text-center">Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach($testimonials as $testimonial)
                    <tr>
                        <td>{{ $testimonial->id }}</td>
                        <td>{{ $testimonial->user->name ?? 'Utilisateur supprimé' }}</td>
                        <td>{{ Str::limit($testimonial->message, 50) }}</td>
                        <td>{{ $testimonial->rating }} / 5</td>
                        <td>
                            @if($testimonial->is_approved)
                                <span class="badge bg-success">Oui</span>
                            @else
                                <span class="badge bg-warning text-dark">Non</span>
                            @endif
                        </td>
                        <td>{{ $testimonial->created_at->format('d M, Y') }}</td>
                        <td class="text-center">
                            <a href="{{ route('testimonials.edit', $testimonial) }}" class="btn btn-sm btn-primary">Éditer</a>

                            <form action="{{ route('testimonials.destroy', $testimonial) }}" method="POST" class="d-inline" onsubmit="return confirm('Confirmer la suppression ?')">
                                @csrf
                                @method('DELETE')
                                <button class="btn btn-sm btn-danger">Supprimer</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>

        {{-- Pagination --}}
        {{ $testimonials->links() }}

    @else
        <div class="alert alert-info text-center">
            Aucun témoignage trouvé.
        </div>
    @endif

</div>
@endsection
