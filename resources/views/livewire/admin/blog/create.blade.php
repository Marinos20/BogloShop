@extends('layouts.admin')

@section('content')
<div class="row">
    <div class="col-md-12">

        <div class="card">
            <div class="card-header">
                <h3>Add Blog Post
                    <a href="{{ route('admin.blog.index') }}" class="btn btn-primary btn-sm float-right">Back</a>
                </h3>
            </div>

            {{-- Formulaire Livewire --}}
            <div class="card-body">
                <form wire:submit.prevent="store" enctype="multipart/form-data">

                    {{-- Titre --}}
                    <div class="mb-3">
                        <label for="title" class="form-label">Title <span class="text-danger">*</span></label>
                        <input type="text" wire:model="title" id="title" class="form-control">
                        @error('title') <span class="text-danger">{{ $message }}</span> @enderror
                    </div>

                    {{-- Contenu --}}
                    <div class="mb-3">
                        <label for="content" class="form-label">Content <span class="text-danger">*</span></label>
                        <textarea wire:model="content" id="content" class="form-control" rows="6"></textarea>
                        @error('content') <span class="text-danger">{{ $message }}</span> @enderror
                    </div>

                    {{-- Image --}}
                    <div class="mb-3">
                        <label for="thumbnail" class="form-label">Thumbnail (Image)</label>
                        <input type="file" wire:model="thumbnail" id="thumbnail" class="form-control">

                        {{-- Preview avant upload --}}
                        @if ($thumbnail)
                            <img src="{{ $thumbnail->temporaryUrl() }}" alt="Preview" class="img-thumbnail mt-2" width="200">
                        @endif

                        @error('thumbnail') <span class="text-danger">{{ $message }}</span> @enderror
                    </div>

                    <button type="submit" class="btn btn-success mt-2">Save</button>
                </form>
            </div>
        </div>

    </div>
</div>
@endsection
