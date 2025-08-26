@extends('layouts.admin')

@section('content')
    <div class="row">
        <div class="col-md-12">
            @include('layouts.inc.admin.flash-message')
            <div class="card">
                <div class="card-header">
                    <h3>Blog Posts
                        <a href="{{ route('admin.blog.create') }}" class="btn btn-primary btn-sm float-right">Add Post</a>
                    </h3>
                </div>
                <livewire:admin.blog.index lazy/>
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
