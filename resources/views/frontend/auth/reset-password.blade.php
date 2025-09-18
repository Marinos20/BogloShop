@extends('layouts.app')
@section('pageTitle', 'Reset Password')
@section('content')
<section class="breadcrumb__area include-bg text-center pt-95 pb-50">
    <div class="container">
        <div class="row">
            <div class="col-xxl-12">
                <div class="breadcrumb__content p-relative z-index-1">
                    <h3 class="breadcrumb__title">Reset Password</h3>
                    <div class="breadcrumb__list">
                        <span><a href="{{ url('/') }}">Home</a></span>
                        <span>Reset Password</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<livewire:frontend.auth.reset-password :token="$token" />
@endsection
