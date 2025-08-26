@extends('layouts.app')
@section('pageTitle', 'Trésors spirituels')

@section('content')

    <!-- breadcrumb area start -->
    <section class="breadcrumb__area include-bg pt-100 pb-50">
        <div class="container">
            <div class="row">
                <div class="col-xxl-12">
                    <div class="breadcrumb__content p-relative z-index-1">
                        <h3 class="breadcrumb__title">Trésors spirituels</h3>
                        <div class="breadcrumb__list">
                            <span><a href="/">Home</a></span>
                            <span>Trésors spirituels</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- breadcrumb area end -->

    <!-- shop area start -->
    <livewire:frontend.collections.index :category="$category"/>
    <!-- shop area end -->

@endsection
