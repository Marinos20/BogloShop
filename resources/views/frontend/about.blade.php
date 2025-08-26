@extends('layouts.app')

@section('content')
<section class="tp-seller-area pb-140 mt-5 py-5">
    <div class="container">
        <!-- Titre général de la page -->
        <div class="row">
            <div class="col-xl-12">
                <div class="tp-section-title-wrapper-2 mb-50 text-center">
                    <span class="tp-section-title-pre-2">
                        Découvrez notre univers
                        <svg width="82" height="22" viewBox="0 0 82 22" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M81 14.5798C0.890564 -8.05914 -5.81154 0.0503902 5.00322 21" stroke="currentColor" stroke-opacity="0.3" stroke-width="2" stroke-miterlimit="3.8637" stroke-linecap="round"/>
                        </svg>
                    </span>
                    <h3 class="tp-section-title-2">À propos de nous</h3>
                </div>
            </div>
        </div>

        <!-- Bloc 1 : Image + Texte -->
        <div class="row align-items-center mb-5">
            <div class="col-md-6 mb-4 mb-md-0">
                <div class="tp-product-item-2 shadow-sm p-3 rounded">
                    <img src="{{ asset('frontend/img/about/about-1.png') }}" class="img-fluid rounded" alt="À propos de nous">
                </div>
            </div>
            <div class="col-md-6">
                <div class="tp-product-item-2 shadow-sm p-4 rounded h-100">
                    <h4 class="tp-section-title-2">Notre mission</h4>
                    <p>Bienvenue sur <b>BOGLO</b>, un espace dédié à la spiritualité sous toutes ses formes. Notre mission est de vous accompagner dans votre quête personnelle, à travers des contenus authentiques, des conseils pratiques, des rituels et des outils spirituels.</p>
                    <p>Que vous soyez débutant ou initié, notre plateforme vous propose articles, guides et ressources pour nourrir votre âme et éveiller votre conscience.</p>
                </div>
            </div>
        </div>

        <!-- Bloc 2 : Voyance en ligne -->
        <div class="row align-items-center mb-5">
            <div class="col-md-6 order-md-2 mb-4 mb-md-0">
                <div class="tp-product-item-2 shadow-sm p-3 rounded">
                    <img src="{{ asset('frontend/img/about/about-2.jpeg') }}" class="img-fluid rounded" alt="Voyance en ligne">
                </div>
            </div>
            <div class="col-md-6 order-md-1">
                <div class="tp-product-item-2 shadow-sm p-4 rounded h-100">
                    <h4 class="tp-section-title-2">Voyance en ligne</h4>
                    <p>À l'ère du numérique, les pratiques spirituelles ancestrales trouvent de nouveaux canaux d'expression. La voyance africaine s’adapte désormais aux réalités technologiques modernes grâce à la voyance en ligne.</p>
                    <p>Lecture des cauris, consultation des ancêtres, interprétation des rêves, utilisation de symboles sacrés et transe divinatoire.</p>
                </div>
            </div>
        </div>

        <!-- Bloc 3 : Travaux occultes -->
        <div class="row align-items-center mb-5">
            <div class="col-md-6 mb-4 mb-md-0">
                <div class="tp-product-item-2 shadow-sm p-3 rounded">
                    <img src="{{ asset('frontend/img/about/about-3.jpg') }}" class="img-fluid rounded" alt="Travaux occultes">
                </div>
            </div>
            <div class="col-md-6">
                <div class="tp-product-item-2 shadow-sm p-4 rounded h-100">
                    <h4 class="tp-section-title-2">Travaux occultes</h4>
                    <p>Les travaux occultes désignent des actions spirituelles réalisées dans le monde invisible pour influencer des événements ou des personnes. Elles sont basées sur des rituels précis, objets sacrés, plantes mystiques et invocation d’esprits ou d’ancêtres.</p>
                    <p>Magie blanche (protection), rouge (amour), noire (domination ou vengeance).</p>
                </div>
            </div>
        </div>

        <!-- Bloc 4 : Traitement des maladies -->
        <div class="row align-items-center mb-5">
            <div class="col-md-6 order-md-2 mb-4 mb-md-0">
                <div class="tp-product-item-2 shadow-sm p-3 rounded">
                    <img src="{{ asset('frontend/img/about/about-4.jpg') }}" class="img-fluid rounded" alt="Traitement des maladies">
                </div>
            </div>
            <div class="col-md-6 order-md-1">
                <div class="tp-product-item-2 shadow-sm p-4 rounded h-100">
                    <h4 class="tp-section-title-2">Traitement des maladies</h4>
                    <p>Dans la tradition africaine, la maladie est perçue comme un déséquilibre spirituel. Nos praticiens utilisent plantes médicinales et rituels pour soigner le corps, l’esprit et l’âme.</p>
                    <p>Chaque préparation suit des règles précises : prières, bains, fumigations et décoctions pour favoriser l’harmonie et le bien-être.</p>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
