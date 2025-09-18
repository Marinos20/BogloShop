<section class="tp-login-area pb-140 p-relative z-index-1 fix">
    @include('layouts.inc.frontend.app.flash-message')
    <div class="tp-login-shape">
        <img class="tp-login-shape-1" src="{{ asset('frontend/img/login/login-shape-1.png') }}" alt="">
        <img class="tp-login-shape-2" src="{{ asset('frontend/img/login/login-shape-2.png') }}" alt="">
        <img class="tp-login-shape-3" src="{{ asset('frontend/img/login/login-shape-3.png') }}" alt="">
        <img class="tp-login-shape-4" src="{{ asset('frontend/img/login/login-shape-4.png') }}" alt="">
    </div>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-xl-6 col-lg-8">
                <div class="tp-login-wrapper">
                    <div class="tp-login-top text-center mb-30">
                        <h3 class="tp-login-title">Réinitialiser le mot de passe</h3>
                        <p>Entrez votre nouveau mot de passe.</p>
                    </div>
                    <form wire:submit.prevent="resetPassword">
                        <div class="tp-login-option">
                            <div class="tp-login-input-wrapper">

                                <!-- Email -->
                                <div class="tp-login-input-box">
                                    <div class="tp-login-input">
                                        <input wire:model="email" type="email" placeholder="votremail@mail.com">
                                    </div>
                                    <div class="tp-login-input-title">
                                        <label for="email">Adresse e-mail</label>
                                    </div>
                                    @error('email') <span class="text-sm text-danger">{{ $message }}</span> @enderror
                                </div>

                                <!-- Nouveau mot de passe -->
                                <div class="tp-login-input-box position-relative">
                                    <div class="tp-login-input">
                                        <input id="password" wire:model="password" type="password" placeholder="Nouveau mot de passe">
                                        <span class="tp-login-input-eye" onclick="togglePassword('password')">
                                            👁️
                                        </span>
                                    </div>
                                    <div class="tp-login-input-title">
                                        <label for="password">Mot de passe</label>
                                    </div>
                                    @error('password') <span class="text-sm text-danger">{{ $message }}</span> @enderror
                                </div>

                                <!-- Confirmer mot de passe -->
                                <div class="tp-login-input-box position-relative">
                                    <div class="tp-login-input">
                                        <input id="password_confirmation" wire:model="password_confirmation" type="password" placeholder="Confirmer mot de passe">
                                        <span class="tp-login-input-eye" onclick="togglePassword('password_confirmation')">
                                            👁️
                                        </span>
                                    </div>
                                    <div class="tp-login-input-title">
                                        <label for="password_confirmation">Confirmer mot de passe</label>
                                    </div>
                                    @error('password_confirmation') <span class="text-sm text-danger">{{ $message }}</span> @enderror
                                </div>

                            </div>

                            <div class="tp-login-bottom">
                                <button wire:loading.remove wire:target="resetPassword" type="submit" class="tp-login-btn w-100">Réinitialiser le mot de passe</button>
                                <button wire:loading wire:target="resetPassword" type="button" class="tp-login-btn w-100">Réinitialisation en cours...</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <script>
        function togglePassword(id) {
            const input = document.getElementById(id);
            if (input.type === "password") {
                input.type = "text";
            } else {
                input.type = "password";
            }
        }
    </script>
</section>
