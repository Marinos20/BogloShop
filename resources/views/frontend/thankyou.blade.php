@extends('layouts.app')
@section('pageTitle', 'Merci pour votre achat')
@section('content')
    <section class="tp-error-area pt-110 pb-110">
        @include('layouts.inc.frontend.app.flash-message')
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-xl-6 col-lg-8 col-md-10">
                    <div class="tp-error-content text-center">
                        <div class="tp-error-thumb">
                            <img src="{{ asset('/frontend/img/product/shop/thankyou.png') }}" width="50%" alt="Thank you">
                        </div>

                        <h4 class="tp-error-title">Success</h4>
                        @if ($paid)
                            <p>Votre paiement de €{{ number_format($order['total_price'], 2) }} a été effectuée avec succès et votre commande a été passée.</p>
                        @else
                            <p>Votre commande de €{{ number_format($order['total_price'], 2) }} Votre commande a été passée.</p>
                        @endif

                        <a href="{{ url('/track-order/'.$trackingNo) }}" class="tp-btn">Suivre votre commande</a>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
