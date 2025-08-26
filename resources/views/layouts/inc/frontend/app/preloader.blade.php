<!-- Loader -->
<div id="loading" role="status" aria-label="Chargement...">
    <div class="tp-preloader-content">
        <div class="tp-preloader-logo">
            <div class="tp-preloader-circle">
                <svg width="190" height="190" viewBox="0 0 380 380" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <!-- Cercle de fond -->
                    <circle stroke="#D9D9D9" cx="190" cy="190" r="180" stroke-width="6" stroke-linecap="round"></circle>
                    <!-- Cercle animé -->
                    <circle class="tp-preloader-animate" stroke="red" cx="190" cy="190" r="180" stroke-width="6" stroke-linecap="round"></circle>
                </svg>
            </div>
            <img src="{{ asset('frontend/img/logo/preloader/preloader-icon.png') }}" alt="Logo Boglo" class="tp-preloader-img">
        </div>
    </div>
</div>

<!-- CSS -->
<style>
    /* Loader full screen */
    #loading {
        display: flex;
        align-items: center;
        justify-content: center;
        height: 100vh;
        width: 100vw;
        position: fixed;
        top: 0; left: 0;
        background: #fff;
        z-index: 9999;
    }

    .tp-preloader-logo {
        position: relative;
        width: 190px;
        height: 190px;
    }

    /* Cercle animé */
    .tp-preloader-circle svg {
        transform: rotate(-90deg);
    }

    .tp-preloader-circle svg circle {
        fill: none;
    }

    .tp-preloader-animate {
        stroke-dasharray: 1130; /* longueur approximative du cercle */
        stroke-dashoffset: 1130;
        animation: dash 2s linear infinite;
    }

    @keyframes dash {
        to {
            stroke-dashoffset: 0;
        }
    }

    /* Logo au centre */
    .tp-preloader-img {
        position: absolute;
        top: 50%; left: 50%;
        transform: translate(-50%, -50%);
        width: 70px;
        height: auto;
    }
</style>

<!-- JS -->
<script>
    window.addEventListener("load", () => {
        const loader = document.getElementById("loading");
        loader.style.opacity = "0";
        loader.style.transition = "opacity 0.6s ease";
        setTimeout(() => loader.style.display = "none", 600);
    });
</script>
