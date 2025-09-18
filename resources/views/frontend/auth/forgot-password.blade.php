@extends('layouts.app')
@section('pageTitle', 'Forgot Password')
@section('content')
<section class="breadcrumb__area include-bg text-center pt-95 pb-50">
    <div class="container">
        <div class="row">
            <div class="col-xxl-12">
                <div class="breadcrumb__content p-relative z-index-1">
                    <h3 class="breadcrumb__title">Forgot Password</h3>
                    <div class="breadcrumb__list">
                        <span><a href="{{ url('/') }}">Home</a></span>
                        <span>Forgot Password</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<livewire:frontend.auth.forgot-password />
@endsection
