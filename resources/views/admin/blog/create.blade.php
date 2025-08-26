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
                    @csrf

                    <div class="mb-3">
                        <label for="title" class="form-label">Title</label>
                        <input type="text" wire:model="title" id="title" class="form-control">
                        @error('title') <span class="text-danger">{{ $message }}</span> @enderror
                    </div>

                    <div class="mb-3">
                        <label for="content" class="form-label">Content</label>
                        <textarea wire:model="content" id="content" class="form-control" rows="5"></textarea>
                        @error('content') <span class="text-danger">{{ $message }}</span> @enderror
                    </div>

                    <div class="mb-3">
                        <label for="thumbnail" class="form-label">Image</label>
                        <input type="file" wire:model="thumbnail" id="thumbnail" class="form-control">
                        @error('thumbnail') <span class="text-danger">{{ $message }}</span> @enderror
                    </div>

                    <button type="submit" class="btn btn-success mt-2">Save</button>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
