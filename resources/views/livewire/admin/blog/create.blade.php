<div class="row">
    <div class="col-md-12">

        <div class="card">
            <div class="card-header">
                <h3>Ajouter un Article
                    <a href="{{ route('admin.blog.index') }}" class="btn btn-primary btn-sm float-right">Retour</a>
                </h3>
            </div>

            <div class="card-body">

                <form wire:submit.prevent="store" enctype="multipart/form-data">

                    <div class="mb-3">
                        <label for="title" class="form-label">Titre <span class="text-danger">*</span></label>
                        <input type="text" wire:model="title" id="title" class="form-control">
                        @error('title') <span class="text-danger">{{ $message }}</span> @enderror
                    </div>

                    <div class="mb-3">
                        <label for="excerpt" class="form-label">Extrait</label>
                        <textarea wire:model="excerpt" id="excerpt" class="form-control" rows="3"></textarea>
                    </div>

                    <div class="mb-3">
                        <label for="content" class="form-label">Contenu</label>
                        <textarea wire:model="content" id="content" class="form-control" rows="6"></textarea>
                        @error('content') <span class="text-danger">{{ $message }}</span> @enderror
                    </div>

                    <div class="mb-3">
                        <label for="thumbnail" class="form-label">Image</label>
                        <input type="file" wire:model="thumbnail" id="thumbnail" class="form-control">
                        @if ($thumbnail)
                            <img src="{{ $thumbnail->temporaryUrl() }}" class="img-thumbnail mt-2" width="200">
                        @endif
                    </div>

                    <div class="mb-3">
                        <label for="published_at">Date de publication</label>
                        <input type="datetime-local" wire:model="published_at" id="published_at" class="form-control">
                    </div>

                    <div class="mb-3">
                        <label for="meta_title">Meta Title</label>
                        <input type="text" wire:model="meta_title" id="meta_title" class="form-control">
                    </div>

                    <div class="mb-3">
                        <label for="meta_keyword">Meta Keyword</label>
                        <input type="text" wire:model="meta_keyword" id="meta_keyword" class="form-control">
                    </div>

                    <div class="mb-3">
                        <label for="meta_description">Meta Description</label>
                        <textarea wire:model="meta_description" id="meta_description" class="form-control" rows="3"></textarea>
                    </div>

                    <div class="mb-3 form-check">
                        <input type="checkbox" wire:model="is_published" id="is_published" class="form-check-input">
                        <label for="is_published" class="form-check-label">Publié</label>
                    </div>

                    <button type="submit" class="btn btn-success">Enregistrer</button>
                </form>
            </div>
        </div>
    </div>
</div>
