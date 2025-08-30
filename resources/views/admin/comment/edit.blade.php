@extends('layouts.admin')

@section('content')
    <livewire:admin.comments.edit :comment="$comment" />
@endsection
