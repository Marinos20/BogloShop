@extends('layouts.admin')

@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h3>Commentaires
                        <a href="{{ route('admin.blog.index') }}" class="btn btn-secondary btn-sm float-right">Retour Blog</a>
                    </h3>
                </div>
                <div class="card-body">
                    <livewire:admin.comments.index lazy />
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
