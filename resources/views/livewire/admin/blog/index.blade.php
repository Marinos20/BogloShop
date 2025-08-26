<div>
    {{-- Modal suppression --}}
    <div wire:ignore.self class="modal fade" id="deleteModal" tabindex="-1" aria-labelledby="deleteModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Delete Post</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>

                <form wire:submit.prevent="destroy">
                    <div class="modal-body">
                        Are you sure you want to delete this post: <strong>{{ $post?->title }}</strong> ?
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-danger">Yes, Delete</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    {{-- Messages flash --}}
    <div class="m-3">
        @if (session()->has('success'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                {{ session('success') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif
    </div>

    {{-- Tableau des posts --}}
    <div class="card-body table-responsive text-nowrap">
        @if ($posts->count() > 0)
            <table class="table table-bordered table-striped">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Thumbnail</th>
                        <th>Title</th>
                        <th>Author</th>
                        <th>Status</th>
                        <th>Published At</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($posts as $postItem)
                        <tr>
                            <td>{{ $loop->iteration + ($posts->currentPage() - 1) * $posts->perPage() }}</td>
                            <td>
                                @if($postItem->thumbnail)
                                    <img src="{{ asset('storage/' . $postItem->thumbnail) }}" width="50" alt="{{ $postItem->title }}">
                                @endif
                            </td>
                            <td>{{ $postItem->title }}</td>
                            <td>{{ $postItem->user?->name ?? 'N/A' }}</td>
                            <td>
                                <button wire:click="updateStatus({{ $postItem->id }})" class="btn btn-outline-secondary btn-sm">
                                    <i class="{{ $postItem->is_published ? 'mdi mdi-check-circle text-success' : 'mdi mdi-close-circle text-muted' }}"></i>
                                </button>
                            </td>
                            <td>{{ $postItem->published_at?->format('d M, Y H:i') ?? '-' }}</td>
                            <td>
                                <a href="{{ route('admin.blog.edit', $postItem->id) }}" class="btn btn-sm btn-dark">
                                    Edit <i class="mdi mdi-file-check btn-icon-append"></i>
                                </a>
                                <button wire:click="deletePost({{ $postItem->id }})" class="btn btn-sm btn-danger" data-bs-toggle="modal" data-bs-target="#deleteModal">
                                    Delete <i class="mdi mdi-delete btn-icon-append"></i>
                                </button>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>

            {{-- Pagination --}}
            <div class="mt-2">
                {{ $posts->links('pagination::bootstrap-5') }}
            </div>
        @else
            <div class="alert alert-info text-center">
                {{ $none ?: 'No posts found.' }}
            </div>
        @endif
    </div>

    {{-- Fermer modal via Livewire --}}
    <script>
        window.addEventListener('close-modal', event => {
            var myModalEl = document.getElementById('deleteModal');
            var modal = bootstrap.Modal.getInstance(myModalEl);
            modal.hide();
        });
    </script>
</div>
