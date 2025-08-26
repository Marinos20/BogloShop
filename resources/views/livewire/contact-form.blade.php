<section class="tp-seller-area pb-140 mt-5 py-5">
    <div class="container">
        {{-- Titre de section --}}
        <div class="row">
            <div class="col-xl-12">
                <div class="tp-section-title-wrapper-2 mb-50 text-center">
                    <span class="tp-section-title-pre-2">
                        Contactez-nous
                        <svg width="82" height="22" viewBox="0 0 82 22" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M81 14.5798C0.890564 -8.05914 -5.81154 0.0503902 5.00322 21" 
                                stroke="currentColor" stroke-opacity="0.3" stroke-width="2" stroke-miterlimit="3.8637" 
                                stroke-linecap="round"></path>
                        </svg>
                    </span>
                    <h3 class="tp-section-title-2">Formulaire de contact</h3>
                </div>
            </div>
        </div>

        {{-- Formulaire --}}
        <div class="row justify-content-center">
            <div class="col-lg-8 col-md-10">
                @if (session()->has('success'))
                    <div class="alert alert-success">
                        {{ session('success') }}
                    </div>
                @endif

                <form wire:submit.prevent="submit" class="row g-3">
                    <div class="col-md-6">
                        <label for="name" class="form-label">Nom</label>
                        <input wire:model="name" type="text" id="name" class="form-control @error('name') is-invalid @enderror">
                        @error('name') <div class="invalid-feedback">{{ $message }}</div> @enderror
                    </div>

                    <div class="col-md-6">
                        <label for="email" class="form-label">Email</label>
                        <input wire:model="email" type="email" id="email" class="form-control @error('email') is-invalid @enderror">
                        @error('email') <div class="invalid-feedback">{{ $message }}</div> @enderror
                    </div>

                    <div class="col-12">
                        <label for="message" class="form-label">Message</label>
                        <textarea wire:model="message" id="message" rows="5" class="form-control @error('message') is-invalid @enderror"></textarea>
                        @error('message') <div class="invalid-feedback">{{ $message }}</div> @enderror
                    </div>

                    <div class="col-12 text-center mt-3">
                        <button type="submit" class="tp-btn tp-btn-border tp-btn-border-sm">Envoyer</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</section>
