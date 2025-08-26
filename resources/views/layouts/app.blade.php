<!doctype html>
<html class="no-js" lang="zxx">

@include('layouts.inc.frontend.app.head')

<body>

    @include('layouts.inc.frontend.app.flash-message')

    <!-- pre loader area start -->
    @include('layouts.inc.frontend.app.preloader')
    <!-- pre loader area end -->

    <!-- back to top start -->
    @include('layouts.inc.frontend.app.back-to-top-start')
    <!-- back to top end -->

    <!-- offcanvas area start -->
    <div class="offcanvas__area offcanvas__style-primary">
        <div class="offcanvas__wrapper">
            <div class="offcanvas__close">
                <button class="offcanvas__close-btn offcanvas-close-btn">
                    <svg width="12" height="12" viewBox="0 0 12 12" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M11 1L1 11" stroke="currentColor" stroke-width="1.5" stroke-linecap="round"
                            stroke-linejoin="round" />
                        <path d="M1 1L11 11" stroke="currentColor" stroke-width="1.5" stroke-linecap="round"
                            stroke-linejoin="round" />
                    </svg>
                </button>
            </div>

            <div class="offcanvas__content">
                <div class="offcanvas__top mb-70 d-flex justify-content-between align-items-center">
                    <div class="offcanvas__logo logo">
                        <a href="{{ url('/') }}">
                            <img src="{{ asset('frontend/img/logo/logo.svg') }}" alt="logo">
                        </a>
                    </div>
                </div>

                <div class="tp-main-menu-mobile fix mb-40"></div>

                <div class="offcanvas__contact align-items-center d-none">
                    <div class="offcanvas__contact-icon mr-20">
                        <span><img src="{{ asset('frontend/img/icon/contact.png') }}" alt=""></span>
                    </div>
                    <div class="offcanvas__contact-content">
                        <h3 class="offcanvas__contact-title">
                            <a href="tel:+2290165887725">+2290165887725</a>
                        </h3>
                    </div>
                </div>

                <div class="offcanvas__btn">
                    <a href="{{ url('contact') }}" class="tp-btn-2 tp-btn-border-2">Contact Us</a>
                </div>
            </div>

            <div class="offcanvas__bottom">
                <div class="offcanvas__footer d-flex align-items-center justify-content-between">

                    <!-- Sélecteur de devise -->
                    <div class="offcanvas__currency-wrapper currency">
                        <span class="tp-currency-toggle">Devise : {{ session('currency', 'USD') }}</span>
                        <ul class="tp-currency-list">
                            <li><a href="{{ route('currency.switch', 'USD') }}">USD</a></li>
                            <li><a href="{{ route('currency.switch', 'EUR') }}">EUR</a></li>
                            <li><a href="{{ route('currency.switch', 'XOF') }}">XOF</a></li>
                            <li><a href="{{ route('currency.switch', 'INR') }}">INR</a></li>
                        </ul>
                    </div>

                    <!-- Sélecteur de langue -->
                    <div class="offcanvas__select language">
                        <div class="offcanvas__lang d-flex align-items-center justify-content-md-end">
                            <div class="offcanvas__lang-img mr-15">
                                <img src="{{ asset('frontend/img/icon/language-flag.png') }}" alt="">
                            </div>
                            <div class="offcanvas__lang-wrapper">
                                <span class="tp-lang-toggle">{{ strtoupper(session('locale', app()->getLocale())) }}</span>
                                <ul class="tp-lang-list">
                                    <li><a href="{{ route('lang.switch', 'fr') }}">Français</a></li>
                                    <li><a href="{{ route('lang.switch', 'en') }}">English</a></li>
                                    <li><a href="{{ route('lang.switch', 'es') }}">Español</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>

                </div>
            </div>

        </div>
    </div>
    <div class="body-overlay"></div>
    <!-- offcanvas area end -->

    <!-- mobile menu area start -->
    <div id="tp-bottom-menu-sticky" class="tp-mobile-menu d-lg-none">
        <div class="container">
            <div class="row row-cols--@auth 5 @else 4 @endauth">
                <div class="col">
                    <div class="tp-mobile-item text-center">
                        <a href="{{ url('/collection') }}" class="tp-mobile-item-btn">
                            <i class="flaticon-store"></i>
                            <span>Shop</span>
                        </a>
                    </div>
                </div>
                <div class="col">
                    <div class="tp-mobile-item text-center">
                        <button class="tp-mobile-item-btn tp-search-open-btn">
                            <i class="flaticon-search-1"></i>
                            <span>Search</span>
                        </button>
                    </div>
                </div>
                @auth
                    <div class="col">
                        <div class="tp-mobile-item text-center">
                            <a href="{{ url('/wishlist') }}" class="tp-mobile-item-btn">
                                <i class="flaticon-love"></i>
                                <span>Wishlist</span>
                            </a>
                        </div>
                    </div>
                @endauth
                @auth
                    <div class="col">
                        <div class="tp-mobile-item text-center">
                            <a href="{{ url('/profile') }}" class="tp-mobile-item-btn">
                                <i class="flaticon-user"></i>
                                <span>Account</span>
                            </a>
                        </div>
                    </div>
                @endauth
                @guest
                    <div class="col">
                        <div class="tp-mobile-item text-center">
                            <a href="{{ url('/login') }}" class="tp-mobile-item-btn">
                                <i class="flaticon-user"></i>
                                <span>Account</span>
                            </a>
                        </div>
                    </div>
                @endguest
                <div class="col">
                    <div class="tp-mobile-item text-center">
                        <button class="tp-mobile-item-btn tp-offcanvas-open-btn">
                            <i class="flaticon-menu-1"></i>
                            <span>Menu</span>
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- mobile menu area end -->

    <!-- search area start -->
    <section class="tp-search-area tp-search-style-secondary">
        <div class="container">
            <div class="row">
                <div class="col-xl-12">
                    <div class="tp-search-form">
                        <div class="tp-search-close text-center mb-20">
                            <button class="tp-search-close-btn tp-search-close-btn"></button>
                        </div>
                        <form action="{{ route('search.products') }}" method="GET">
                            <div class="tp-search-input mb-10">
                                <input type="text" name="keyword" placeholder="Search for product...">
                                <button type="submit"><i class="flaticon-search-1"></i></button>
                            </div>
                            <div class="tp-search-category">
                                <span>Search by : </span>
                                <a href="{{ route('search.products', ['keyword'=>'Chance']) }}">Chance, </a>
                                <a href="{{ route('search.products', ['keyword'=>'Attraction']) }}">Attraction, </a>
                                <a href="{{ route('search.products', ['keyword'=>'Bague']) }}">Bague, </a>
                                <a href="{{ route('search.products', ['keyword'=>'Protection']) }}">Protection, </a>
                                <a href="{{ route('search.products', ['keyword'=>'Parfums']) }}">Parfums</a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- search area end -->

    <!-- cart mini area start -->
    @include('layouts.inc.frontend.app.cart')

    <!-- header area start -->
    @include('layouts.inc.frontend.app.header')
    <!-- header area end -->

    <main>
        @yield('content')
    </main>

    <!-- footer area start -->
    @include('layouts.inc.frontend.app.footer')
    <!-- footer area end -->

    <!-- BANNIÈRE COOKIES -->
<!-- BANNIÈRE COOKIES -->
<div id="cookie-banner" style="display: none !important; position: fixed; bottom: 0; left: 0; width: 100%; background: #333; color: #fff; padding: 15px; display: flex; justify-content: space-between; align-items: center; z-index: 9999;">
    <span>Nous utilisons des cookies pour améliorer votre expérience sur notre site.</span>
    <div>
        <button id="accept-cookies" style="background: #fff; color: #333; border: none; padding: 5px 15px; cursor: pointer;">Accepter</button>
        <button id="reject-cookies" style="background: #555; color: #fff; border: none; padding: 5px 15px; cursor: pointer;">Refuser</button>
    </div>
</div>



    <!-- JS et gestion cookies -->
    @include('assets.frontend.js.script')

    <!-- Dropdown fonctionnel pour devise et langue -->
    <style>
        .tp-currency-list,
        .tp-lang-list {
            display: none;
            position: absolute;
            bottom: 100%;
            left: 0;
            background: #fff;
            list-style: none;
            padding: 5px 0;
            margin: 0;
            min-width: 120px;
            border: 1px solid #ccc;
            z-index: 999;
        }

        .tp-currency-list li,
        .tp-lang-list li {
            padding: 5px 15px;
            cursor: pointer;
        }

        .tp-currency-list li:hover,
        .tp-lang-list li:hover {
            background: #eee;
        }

        .tp-currency-list.active,
        .tp-lang-list.active {
            display: block;
        }
    </style>

    <script>
document.addEventListener('DOMContentLoaded', function () {
    // Dropdown devise
    const currencyToggle = document.querySelector('.tp-currency-toggle');
    const currencyList = document.querySelector('.tp-currency-list');

    // Dropdown langue
    const langToggle = document.querySelector('.tp-lang-toggle');
    const langList = document.querySelector('.tp-lang-list');

    if (currencyToggle && currencyList) {
        currencyToggle.addEventListener('click', function (e) {
            e.stopPropagation();
            currencyList.classList.toggle('active');
            if(langList) langList.classList.remove('active');
        });
    }

    if (langToggle && langList) {
        langToggle.addEventListener('click', function (e) {
            e.stopPropagation();
            langList.classList.toggle('active');
            if(currencyList) currencyList.classList.remove('active');
        });
    }

    // Fermer menus si clic en dehors
    document.addEventListener('click', function () {
        if(currencyList) currencyList.classList.remove('active');
        if(langList) langList.classList.remove('active');
    });

    // COOKIES
    const banner = document.getElementById('cookie-banner');
    const acceptBtn = document.getElementById('accept-cookies');
    const rejectBtn = document.getElementById('reject-cookies');

    // Toujours masquer par défaut
    if(banner) banner.style.display = 'none';

    const cookiesConsent = localStorage.getItem('cookiesAccepted');

    if(cookiesConsent === 'true') {
        loadGoogleAnalytics();
    } else if(cookiesConsent === 'false') {
        // Rien à faire, banner déjà masqué
    } else {
        // Affiche la bannière si jamais aucun choix enregistré
        if(banner) banner.style.display = 'flex';
    }

    acceptBtn.addEventListener('click', function () {
        localStorage.setItem('cookiesAccepted', 'true');
        if(banner) banner.style.display = 'none';
        loadGoogleAnalytics();
    });

    rejectBtn.addEventListener('click', function () {
        localStorage.setItem('cookiesAccepted', 'false');
        if(banner) banner.style.display = 'none';
    });

    function loadGoogleAnalytics() {
        if(window.gtag) return; // éviter double chargement
        const gaScript = document.createElement('script');
        gaScript.async = true;
        gaScript.src = "https://www.googletagmanager.com/gtag/js?id=G-9CVW6TXE24";
        document.head.appendChild(gaScript);
        gaScript.onload = function() {
            window.dataLayer = window.dataLayer || [];
            function gtag(){dataLayer.push(arguments);}
            window.gtag = gtag;
            gtag('js', new Date());
            gtag('config', 'G-9CVW6TXE24');
        }
    }
});
</script>



</body>
</html>
