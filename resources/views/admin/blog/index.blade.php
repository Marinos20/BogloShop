@extends('layouts.admin')

@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h3>Blog
                        <a href="{{ route('admin.blog.create') }}" class="btn btn-primary btn-sm float-right">Ajouter un article</a>
                    </h3>
                </div>
                <div class="card-body">
                    <livewire:admin.blog.index lazy />
                </div>
            </div>
        </div>
    </div>
@endsection

@push('script')
<script>
    window.addEventListener('close-modal', event => {
        $('#deleteModal').modal('hide');
    });
</script>
@endpush
