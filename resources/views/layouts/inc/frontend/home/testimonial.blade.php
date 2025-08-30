<section class="tp-testimonial-area grey-bg-7 pt-130 pb-135">
    <div class="container">
        <div class="row justify-content-center">

            {{-- Formulaire pour utilisateurs connectés --}}
            @auth
            <div class="col-xl-8 mb-5 text-center">

                {{-- Message de succès --}}
                @if(session('success'))
                    <div class="alert alert-success">{{ session('success') }}</div>
                @endif

                {{-- Bouton pour ouvrir le formulaire --}}
                <button type="button" id="toggleReviewForm" class="btn btn-lg btn-primary mb-4 animate-bounce">
                    ✍️ Laissez votre avis
                </button>

                {{-- Formulaire masqué par défaut --}}
                <div id="reviewFormContainer" style="display: none;">
                    <form id="reviewForm" action="{{ route('testimonials.store') }}" method="POST">
                        @csrf
                        <div class="form-group mb-3">
                            <label for="message">Votre avis</label>
                            <textarea name="message" id="message" class="form-control" rows="3" required>{{ old('message') }}</textarea>
                            @error('message') <small class="text-danger">{{ $message }}</small> @enderror
                        </div>

                        <div class="form-group mb-3">
                            <label for="rating">Note</label>
                            <select name="rating" id="rating" class="form-control" required>
                                @for($i = 1; $i <= 5; $i++)
                                    <option value="{{ $i }}" {{ old('rating') == $i ? 'selected' : '' }}>
                                        {{ $i }} étoiles
                                    </option>
                                @endfor
                            </select>
                            @error('rating') <small class="text-danger">{{ $message }}</small> @enderror
                        </div>

                        <button type="submit" class="btn btn-success">💾 Envoyer mon avis</button>
                    </form>
                </div>
            </div>
            @else
            <div class="col-xl-8 mb-5 text-center">
                <p>Veuillez <a href="{{ route('login') }}">vous connecter</a> pour laisser un avis.</p>
            </div>
            @endauth

            {{-- Slider dynamique des témoignages --}}
            <div class="col-xl-12">
                <div class="tp-testimonial-slider p-relative z-index-1">
                    <h3 class="tp-testimonial-section-title text-center">Avis des clients</h3>

                    <div class="row justify-content-center">
                        <div class="col-xl-8 col-lg-8 col-md-10">
                            <div class="tp-testimonial-slider-active swiper-container">
                                <div class="swiper-wrapper">
                                    @forelse($testimonials as $testimonial)
                                        <div class="tp-testimonial-item text-center mb-20 swiper-slide">
                                            <div class="tp-testimonial-rating mb-2">
                                                @for($i = 0; $i < $testimonial->rating; $i++)
                                                    <span><i class="fa-solid fa-star"></i></span>
                                                @endfor
                                            </div>
                                            <div class="tp-testimonial-content">
                                                <p>“{{ $testimonial->message }}”</p>
                                            </div>
                                            <div class="tp-testimonial-user-wrapper d-flex align-items-center justify-content-center">
                                                <div class="tp-testimonial-user d-flex align-items-center">
                                                    <div class="tp-testimonial-avater mr-10">
                                                        <img src="{{ $testimonial->user?->avatar ?? asset('frontend/img/users/default.jpg') }}" 
                                                             alt="{{ $testimonial->user?->name ?? 'Utilisateur' }}">
                                                    </div>
                                                    <div class="tp-testimonial-user-info tp-testimonial-user-translate">
                                                        <h3 class="tp-testimonial-user-title">{{ $testimonial->user?->name ?? 'Utilisateur' }}</h3>
                                                        <span class="tp-testimonial-designation">
                                                            {{ $testimonial->user?->role ?? 'Client' }}
                                                        </span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    @empty
                                        <p class="text-center">Aucun avis disponible pour le moment.</p>
                                    @endforelse
                                </div>

                                {{-- Flèches du slider --}}
                                <div class="tp-testimonial-arrow d-none d-md-block">
                                    <button class="tp-testimonial-slider-button-prev">←</button>
                                    <button class="tp-testimonial-slider-button-next">→</button>
                                </div>
                                <div class="tp-testimonial-slider-dot tp-swiper-dot text-center mt-30 tp-swiper-dot-style-darkRed d-md-none"></div>

                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>

    {{-- JS pour ouvrir le formulaire --}}
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            const toggleBtn = document.getElementById('toggleReviewForm');
            const formContainer = document.getElementById('reviewFormContainer');

            toggleBtn.addEventListener('click', () => {
                formContainer.style.display = 'block';
                toggleBtn.style.display = 'none';
                formContainer.scrollIntoView({ behavior: 'smooth' });
            });
        });
    </script>

    {{-- Animation du bouton --}}
    <style>
        .animate-bounce {
            animation: bounce 1s infinite;
        }

        @keyframes bounce {
            0%, 100% { transform: translateY(0); }
            50% { transform: translateY(-10px); }
        }
    </style>
</section>
