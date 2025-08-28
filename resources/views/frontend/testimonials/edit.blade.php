@extends('layouts.admin')

@section('content')
<div class="container-fluid py-4">
    <h4 class="mb-4">✏️ Éditer le témoignage</h4>

    @if(session('success'))
        <div class="alert alert-success text-center">{{ session('success') }}</div>
    @endif

    <div class="card shadow">
        <div class="card-body">
            <form action="{{ route('testimonials.update', $testimonial) }}" method="POST">
                @csrf
                @method('PUT')

                {{-- Message --}}
                <div class="mb-3">
                    <label for="message" class="form-label">Message</label>
                    <textarea id="message" name="message" class="form-control" rows="4">{{ old('message', $testimonial->message) }}</textarea>
                    @error('message') <small class="text-danger">{{ $message }}</small> @enderror
                </div>

                {{-- Note --}}
                <div class="mb-3">
                    <label for="rating" class="form-label">Note ⭐</label>
                    <select id="rating" name="rating" class="form-control">
                        @for($i=1; $i<=5; $i++)
                            <option value="{{ $i }}" {{ old('rating', $testimonial->rating) == $i ? 'selected' : '' }}>{{ $i }} étoiles</option>
                        @endfor
                    </select>
                    @error('rating') <small class="text-danger">{{ $message }}</small> @enderror
                </div>

                {{-- Approuvé --}}
                <div class="mb-3 form-check">
                    <input type="checkbox" class="form-check-input" id="is_approved" name="is_approved" value="1" {{ old('is_approved', $testimonial->is_approved) ? 'checked' : '' }}>
                    <label class="form-check-label" for="is_approved">Approuvé</label>
                </div>

                <button type="submit" class="btn btn-success">💾 Enregistrer</button>
                <a href="{{ route('testimonials.index') }}" class="btn btn-secondary">Retour</a>
            </form>
        </div>
    </div>
</div>
@endsection
