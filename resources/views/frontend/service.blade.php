@extends('layouts.app')

@section('content')
<section class="tp-seller-area pb-140 mt-5 py-5">
    <div class="container">
        <!-- Titre principal -->
        <div class="row">
            <div class="col-xl-12">
                <div class="tp-section-title-wrapper-2 mb-50 text-center">
                    <span class="tp-section-title-pre-2">
                        Découvrez nos services
                        <svg width="82" height="22" viewBox="0 0 82 22" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M81 14.5798C0.890564 -8.05914 -5.81154 0.0503902 5.00322 21" stroke="currentColor" stroke-opacity="0.3" stroke-width="2" stroke-miterlimit="3.8637" stroke-linecap="round"/>
                        </svg>
                    </span>
                    <h3 class="tp-section-title-2">Nos Services</h3>
                </div>
            </div>
        </div>

        <!-- Section Services -->
        <div class="row g-4">
            <div class="col-md-4">
                <div class="tp-product-item-2 shadow-sm p-4 rounded h-100 text-center">
                    <h5 class="fw-bold mb-3">Puissant rituel très efficace pour gagner un procès</h5>
                    <p>Découvrez un rituel puissant pour gagner un procès et influencer l'issue de votre affaire judiciaire. 
                        Grâce à des pratiques spirituelles efficaces, obtenez l'aide nécessaire pour garantir la victoire. Contactez un expert pour un rituel personnalisé. (+229) 0165887725.</p>
                </div>
            </div>
            <div class="col-md-4">
                <div class="tp-product-item-2 shadow-sm p-4 rounded h-100 text-center">
                    <h5 class="fw-bold mb-3">Retour d’affection rapide: Rituels et Secret</h5>
                    <p>Récupérer son l’être aimé rapide renforce les sentiments existants entre lui et vous, surtout renouer le dialogue qui était rompu entre vous et votre partenaire.
                        Récupérer son l’être aimé rapide est une pratique de magie blanche qui consiste à effectuer un rituel d’envoûtement sur la personne.

                    </p>
                </div>
            </div>
            <div class="col-md-4">
                <div class="tp-product-item-2 shadow-sm p-4 rounded h-100 text-center">
                    <h5 class="fw-bold mb-3">Desenvoutement : Un Acte de Libération Spirituelle</h5>
                    <p>Le désenvoûtement intrigue et fascine depuis des siècles. Il est souvent perçu comme une réponse aux influences négatives. Cette pratique regroupe un ensemble de
                         rituels et de méthodes spirituelles. Son but est de restaurer l’équilibre énergétique et d’éloigner toute oppression invisible.
</p>
                </div>
            </div>
        </div>

        <!-- FAQ -->
        <div class="row mt-5">
            <div class="col-xl-12">
                <h3 class="tp-section-title-2 mb-4">FAQ - Questions fréquentes</h3>
                <div class="accordion" id="faqAccordion">
                    <div class="accordion-item">
                        <h2 class="accordion-header" id="headingOne">
                            <button class="accordion-button tp-btn tp-btn-border w-100 text-start" type="button" data-bs-toggle="collapse" data-bs-target="#faq1" aria-expanded="true" aria-controls="faq1">
                               Quels sont les avantages d'une consultation spirituelle ?
                            </button>
                        </h2>
                        <div id="faq1" class="accordion-collapse collapse show" aria-labelledby="headingOne" data-bs-parent="#faqAccordion">
                            <div class="accordion-body">
                                Une consultation spirituelle peut vous aider à trouver des réponses à vos préoccupations, qu'elles soient d'ordre personnel, familial ou professionnel. Elle peut aussi vous guider dans la guérison spirituelle, la paix intérieure et l'équilibre entre le corps, 
                                l'esprit et l'âme.
                            </div>
                        </div>
                    </div>
                    <div class="accordion-item">
                        <h2 class="accordion-header" id="headingTwo">
                            <button class="accordion-button collapsed tp-btn tp-btn-border w-100 text-start" type="button" data-bs-toggle="collapse" data-bs-target="#faq2" aria-expanded="false" aria-controls="faq2">
                                Quels types de rituels sont pratiqués dans vos services ?
                            </button>
                        </h2>
                        <div id="faq2" class="accordion-collapse collapse" aria-labelledby="headingTwo" data-bs-parent="#faqAccordion">
                            <div class="accordion-body">
                                Les rituels varient en fonction de vos besoins. Ils peuvent inclure des prières de protection, des bénédictions de prospérité, des cérémonies de purification, ou des rituels pour apaiser les ancêtres. Chaque rituel est personnalisé selon les spécificités culturelles et
                                 spirituelles de chaque individu ou famille.
                            </div>
                        </div>
                    </div>

                    
                    <div class="accordion-item">
                        <h2 class="accordion-header" id="headingThree">
                            <button class="accordion-button collapsed tp-btn tp-btn-border w-100 text-start" type="button" data-bs-toggle="collapse" data-bs-target="#faq3" aria-expanded="false" aria-controls="faq3">
                                Est-ce que vos services sont disponibles à distance ?
                            </button>
                        </h2>
                        <div id="faq3" class="accordion-collapse collapse" aria-labelledby="headingThree" data-bs-parent="#faqAccordion">
                            <div class="accordion-body">
                                Oui, nous proposons des consultations et des séances spirituelles à distance, par téléphone, visioconférence ou via d'autres plateformes numériques. Cela permet à nos clients d'accéder
                                 à nos services de n'importe où.
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Témoignages -->
        <div class="row mt-5">
            <div class="col-xl-12">
                <div class="tp-testimonial-slider p-relative z-index-1">
                    <h3 class="tp-section-title-2 text-center mb-5">Avis de nos clients</h3>
                    <div class="tp-testimonial-slider-active swiper-container">
                        <div class="swiper-wrapper">
                            <!-- Item 1 -->
                            <div class="tp-testimonial-item text-center mb-20 swiper-slide">
                                <div class="tp-testimonial-rating mb-2">
                                    <span><i class="fa-solid fa-star"></i></span>
                                    <span><i class="fa-solid fa-star"></i></span>
                                    <span><i class="fa-solid fa-star"></i></span>
                                    <span><i class="fa-solid fa-star"></i></span>
                                    <span><i class="fa-solid fa-star"></i></span>
                                </div>
                                <p class="mb-3">“Service rapide, interface intuitive et équipe très professionnelle. Je recommande vivement cette boutique.”</p>
                                <div class="tp-testimonial-user-wrapper d-flex align-items-center justify-content-center">
                                    <div class="tp-testimonial-user d-flex align-items-center">
                                        <div class="tp-testimonial-avater mr-10">
                                            <img src="frontend/img/users/user-2.jpg" alt="">
                                        </div>
                                        <div class="tp-testimonial-user-info tp-testimonial-user-translate">
                                            <h3 class="tp-testimonial-user-title">Theodore Handle</h3>
                                            <span class="tp-testimonial-designation">Entrepreneur</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- Item 2 -->
                            <div class="tp-testimonial-item text-center mb-20 swiper-slide">
                                <div class="tp-testimonial-rating mb-2">
                                    <span><i class="fa-solid fa-star"></i></span>
                                    <span><i class="fa-solid fa-star"></i></span>
                                    <span><i class="fa-solid fa-star"></i></span>
                                    <span><i class="fa-solid fa-star"></i></span>
                                    <span><i class="fa-solid fa-star"></i></span>
                                </div>
                                <p class="mb-3">“Je suis très satisfait de mon expérience. Livraison dans les temps et produit conforme à la description.”</p>
                                <div class="tp-testimonial-user-wrapper d-flex align-items-center justify-content-center">
                                    <div class="tp-testimonial-user d-flex align-items-center">
                                        <div class="tp-testimonial-avater mr-10">
                                            <img src="frontend/img/users/user-3.jpg" alt="">
                                        </div>
                                        <div class="tp-testimonial-user-info tp-testimonial-user-translate">
                                            <h3 class="tp-testimonial-user-title">Tado Emilie</h3>
                                            <span class="tp-testimonial-designation">Client fidèle</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- Item 3 -->
                            <div class="tp-testimonial-item text-center mb-20 swiper-slide">
                                <div class="tp-testimonial-rating mb-2">
                                    <span><i class="fa-solid fa-star"></i></span>
                                    <span><i class="fa-solid fa-star"></i></span>
                                    <span><i class="fa-solid fa-star"></i></span>
                                    <span><i class="fa-solid fa-star"></i></span>
                                    <span><i class="fa-solid fa-star"></i></span>
                                </div>
                                <p class="mb-3">“Un excellent service client. J’ai eu une réponse à ma question en moins de 30 minutes. Très rassurant.”</p>
                                <div class="tp-testimonial-user-wrapper d-flex align-items-center justify-content-center">
                                    <div class="tp-testimonial-user d-flex align-items-center">
                                        <div class="tp-testimonial-avater mr-10">
                                            <img src="frontend/img/users/user-4.jpg" alt="">
                                        </div>
                                        <div class="tp-testimonial-user-info tp-testimonial-user-translate">
                                            <h3 class="tp-testimonial-user-title">James Serge Tchokpon</h3>
                                            <span class="tp-testimonial-designation">Developer</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Slider arrows & dots -->
                </div>
            </div>
        </div>

    </div>
</section>
@endsection
