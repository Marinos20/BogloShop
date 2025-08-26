<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <h3>Edit Post
                    <a href="{{ route('admin.blog.index') }}" class="btn btn-primary btn-sm float-right">Back</a>
                </h3>
            </div>
            <div class="card-body">
                <form wire:submit.prevent="update" enctype="multipart/form-data">
                    <div class="row">

                        {{-- Title --}}
                        <div class="col-md-6 mb-3">
                            <label>Title</label>
                            <input type="text" wire:model.defer="title" class="form-control" placeholder="Enter title">
                            @error('title')
                                <span class="text-sm text-danger"><small>{{ $message }}</small></span>
                            @enderror
                        </div>

                        {{-- Thumbnail --}}
                        <div class="col-md-6 mb-3">
                            <label>Thumbnail</label>
                            <input type="file" wire:model="thumbnail" class="form-control">
                            @if ($thumbnail && is_string($thumbnail))
                                <img src="{{ asset('storage/' . $thumbnail) }}" width="100" alt="{{ $title }}" class="mt-2">
                            @elseif ($thumbnail && $thumbnail instanceof \Livewire\TemporaryUploadedFile)
                                <img src="{{ $thumbnail->temporaryUrl() }}" width="100" alt="{{ $title }}" class="mt-2">
                            @endif
                            @error('thumbnail')
                                <span class="text-sm text-danger"><small>{{ $message }}</small></span>
                            @enderror
                        </div>

                        {{-- Excerpt --}}
                        <div class="col-md-12 mb-3">
                            <label>Excerpt</label>
                            <textarea wire:model.defer="excerpt" rows="3" class="form-control" placeholder="Enter excerpt"></textarea>
                            @error('excerpt')
                                <span class="text-sm text-danger"><small>{{ $message }}</small></span>
                            @enderror
                        </div>

                        {{-- Content --}}
                        <div class="col-md-12 mb-3">
                            <label>Content</label>
                            <textarea wire:model.defer="content" rows="6" class="form-control" placeholder="Enter content"></textarea>
                            @error('content')
                                <span class="text-sm text-danger"><small>{{ $message }}</small></span>
                            @enderror
                        </div>

                        {{-- Status --}}
                        <div class="col-md-6 mb-3">
                            <label>Status</label><br>
                            <input type="checkbox" wire:model="is_published"> Published
                        </div>

                        {{-- Published At --}}
                        <div class="col-md-6 mb-3">
                            <label>Published At</label>
                            <input type="datetime-local" wire:model="published_at" class="form-control">
                        </div>

                        {{-- SEO Tags --}}
                        <div class="col-md-12 mt-3">
                            <h4>SEO Tags</h4>
                        </div>

                        <div class="col-md-12 mb-3">
                            <label>Meta Title</label>
                            <input type="text" wire:model.defer="meta_title" class="form-control" placeholder="Enter meta title">
                            @error('meta_title')
                                <span class="text-sm text-danger"><small>{{ $message }}</small></span>
                            @enderror
                        </div>

                        <div class="col-md-12 mb-3">
                            <label>Meta Keywords</label>
                            <textarea wire:model.defer="meta_keyword" rows="3" class="form-control" placeholder="Enter meta keywords"></textarea>
                            @error('meta_keyword')
                                <span class="text-sm text-danger"><small>{{ $message }}</small></span>
                            @enderror
                        </div>

                        <div class="col-md-12 mb-3">
                            <label>Meta Description</label>
                            <textarea wire:model.defer="meta_description" rows="3" class="form-control" placeholder="Enter meta description"></textarea>
                            @error('meta_description')
                                <span class="text-sm text-danger"><small>{{ $message }}</small></span>
                            @enderror
                        </div>

                        {{-- Buttons --}}
                        <div class="col-md-12 mb-3">
                            <button wire:loading.remove type="submit" class="btn btn-primary btn-icon-text float-right">
                                <i class="mdi mdi-file-check btn-icon-prepend"></i> Update
                            </button>
                            <button wire:loading.disabled class="btn btn-info btn-icon-text float-right">
                                Updating <i class="mdi mdi-loading mdi-spin btn-icon-prepend"></i>
                            </button>
                        </div>

                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
