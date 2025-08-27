@extends('layouts.admin')

@section('content')
    <livewire:admin.blog.edit :post="$post" />
@endsection
