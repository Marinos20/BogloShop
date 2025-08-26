@extends('layouts.app')

@section('content')
<section class="tp-seller-area pb-140 mt-5 py-5 bg-light">
    <div class="container">
        <div class="row">
            <div class="col-xl-12">
                <div class="tp-section-title-wrapper-2 mb-50 text-center">
                    <span class="tp-section-title-pre-2">
                        Contactez-nous
                        <svg width="82" height="22" viewBox="0 0 82 22" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M81 14.5798C0.890564 -8.05914 -5.81154 0.0503902 5.00322 21" stroke="currentColor" stroke-opacity="0.3" stroke-width="2" stroke-miterlimit="3.8637" stroke-linecap="round"></path>
                        </svg>
                    </span>
                    <h3 class="tp-section-title-2">Nous sommes à votre écoute</h3>
                </div>
            </div>
        </div>

        <div class="row justify-content-center">
<!-- Infos de contact stylée -->
<div class="col-xl-5 col-lg-6 mb-40">
    <div class="tp-contact-info p-4 bg-white rounded shadow-sm h-100">
        <ul class="list-unstyled fs-6">
            <!-- Adresse -->
            <li class="mb-3">
                <div class="d-flex align-items-center justify-content-between">
                    <div class="d-flex align-items-center">
                        <i class="bi bi-geo-alt-fill me-3 text-dark fs-5"></i>
                        <span>Cotonou, Bénin</span>
                    </div>
                    <a href="https://goo.gl/maps/xxxx" target="_blank" class="btn btn-outline-dark btn-sm">Voir sur la carte</a>
                </div>
            </li>

            <!-- Email -->
            <li class="mb-3">
                <div class="d-flex align-items-center justify-content-between">
                    <div class="d-flex align-items-center">
                        <i class="bi bi-envelope-fill me-3 text-dark fs-5"></i>
                        <span>medium@boglo.shop</span>
                    </div>
                    <a href="mailto:medium@boglo" class="btn btn-outline-dark btn-sm">Envoyer un mail</a>
                </div>
            </li>

            <!-- Téléphone -->
            <li class="mb-3">
                <div class="d-flex align-items-center justify-content-between">
                    <div class="d-flex align-items-center">
                        <i class="bi bi-telephone-fill me-3 text-dark fs-5"></i>
                        <span>+229 01 65 88 77 25</span>
                    </div>
                    <a href="tel:+22990000000" class="btn btn-outline-dark btn-sm">Appeler</a>
                </div>
            </li>

            <!-- Horaires -->
            <li class="mb-3">
                <div class="d-flex align-items-center justify-content-between">
                    <div class="d-flex align-items-center">
                        <i class="bi bi-clock-fill me-3 text-dark fs-5"></i>
                        <span>Lundi - Dimanche : 9h - 18h</span>
                    </div>
                    <span class="badge bg-dark text-white">Ouvert</span>
                </div>
            </li>

            <!-- Réseaux sociaux -->
            <li class="mb-3 d-flex gap-2">
                <a href="https://facebook.com/Spirituelle Mood " target="_blank" class="btn btn-primary btn-sm flex-grow-1">
                    <i class="bi bi-facebook me-2"></i>Facebook
                </a>
                <a href="https://instagram.com/bogloshop" target="_blank" class="btn btn-danger btn-sm flex-grow-1">
                    <i class="bi bi-instagram me-2"></i>Instagram
                </a>
            </li>
        </ul>
    </div>
</div>


            <!-- Formulaire -->
            <div class="col-xl-5 col-lg-6 mb-40">
                <form action="{{ route('contact.send') }}" method="POST" class="tp-contact-form p-4 bg-white rounded shadow-sm">
                    @csrf
                    <div class="mb-3">
                        <label for="name" class="form-label fw-semibold text-black">Nom complet</label>
                        <input type="text" name="name" id="name" class="form-control" placeholder="Votre nom" required>
                    </div>
                    <div class="mb-3">
                        <label for="email" class="form-label fw-semibold text-black">Adresse email</label>
                        <input type="email" name="email" id="email" class="form-control" placeholder="Votre email" required>
                    </div>
                    <div class="mb-3">
                        <label for="message" class="form-label fw-semibold text-black">Message</label>
                        <textarea name="message" id="message" class="form-control" rows="5" placeholder="Votre message" required></textarea>
                    </div>
                    <button type="submit" class="tp-btn tp-btn-border w-100 fw-bold">Envoyer</button>
                </form>
            </div>
        </div>
    </div>
</section>
@endsection
