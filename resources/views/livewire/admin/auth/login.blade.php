<div class="container-scroller">
    <div class="container-fluid page-body-wrapper full-page-wrapper">
        <div class="content-wrapper d-flex align-items-center auth px-0">
            <div class="row w-100 mx-0">
                <div class="col-lg-4 mx-auto">
                    <div class="auth-form-light text-left py-5 px-4 px-sm-5">
                        <div class="brand-logo">
                            <h3>Boglo Shop</h3>
                        </div>
                        <h4>Bonjour ! Commençons.</h4>
                        <h6 class="font-weight-light">Connectez-vous pour continuer.</h6>
                        <form wire:submit="store" class="pt-3">
                            @csrf
                            <div class="form-group">
                                <input wire:model="email" type="email" class="form-control form-control-lg"
                                    id="exampleInputEmail1" placeholder="email">
                                @error('email')
                                    <span class="text-sm text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <input wire:model="password" type="password" class="form-control form-control-lg"
                                    id="exampleInputPassword1" placeholder="Password">
                                @error('password')
                                    <span class="text-sm text-danger">{{ $message }}</span>
                                @enderror
                            </div>

                            <div class="form-group" class="mt-3">
                                <button type="submit" wire:loading.remove
                                    class="btn btn-block btn-primary btn-lg font-weight-medium auth-form-btn">CONNEXION
                                    </button>

                                    <button disabled wire:loading
                                    class="btn btn-block btn-info btn-lg font-weight-medium auth-form-btn">CONNEXION EN COURS
                                     <i class="spinner-border spinner-border-sm"></i></button>
                            </div>
{{--
                            <div class="text-center mt-4 font-weight-light">
                                Vous n’avez pas de compte ? <a href="{{ url('/admin/register') }}"
                                    class="text-primary">S’inscrire</a>
                            </div> --}}
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <!-- content-wrapper ends -->
    </div>
    <!-- page-body-wrapper ends -->
</div>
