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
                        <h3 class="tp-login-title">Mot de passe oublié</h3>
                        <p>Entrez votre adresse e-mail pour recevoir le lien de réinitialisation.</p>
                    </div>
                    <form wire:submit.prevent="sendResetLink">
                        <div class="tp-login-option">
                            <div class="tp-login-input-wrapper">
                                <div class="tp-login-input-box">
                                    <div class="tp-login-input">
                                        <input wire:model="email" type="email" placeholder="votremail@mail.com">
                                    </div>
                                    <div class="tp-login-input-title">
                                        <label for="email">Adresse e-mail</label>
                                    </div>
                                    @error('email') <span class="text-sm text-danger">{{ $message }}</span> @enderror
                                </div>
                            </div>
                            <div class="tp-login-bottom">
                                <button wire:loading.remove wire:target="sendResetLink" type="submit" class="tp-login-btn w-100">Envoyer le lien</button>
                                <button wire:loading wire:target="sendResetLink" type="button" class="tp-login-btn w-100">Envoi en cours...</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>
