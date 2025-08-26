<div>
    <form wire:submit.prevent="update" enctype="multipart/form-data">
        <div class="mb-3">
            <label>Title</label>
            <input type="text" wire:model="title" class="form-control">
            @error('title') <span class="text-danger">{{ $message }}</span> @enderror
        </div>

        <div class="mb-3">
            <label>Excerpt</label>
            <textarea wire:model="excerpt" class="form-control" rows="3"></textarea>
            @error('excerpt') <span class="text-danger">{{ $message }}</span> @enderror
        </div>

        <div class="mb-3">
            <label>Content</label>
            <textarea wire:model="content" class="form-control" rows="5"></textarea>
            @error('content') <span class="text-danger">{{ $message }}</span> @enderror
        </div>

        <div class="mb-3">
            <label>Thumbnail</label>
            <input type="file" wire:model="thumbnail" class="form-control">

            @if ($thumbnail)
                <img src="{{ $thumbnail->temporaryUrl() }}" width="100" class="mt-2">
            @elseif($post->thumbnail)
                <img src="{{ asset('storage/uploads/blog/' . $post->thumbnail) }}" width="100" class="mt-2">
            @endif

            @error('thumbnail') <span class="text-danger">{{ $message }}</span> @enderror
        </div>

        <div class="mb-3">
            <label>Status</label><br>
            <input type="checkbox" wire:model="is_published"> Published
        </div>

        <button type="submit" class="btn btn-success mt-2">Update</button>
    </form>
</div>
