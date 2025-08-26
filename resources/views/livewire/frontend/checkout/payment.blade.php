<section class="tp-checkout-area pb-120" style="background-color: #eff1f5;">
    @include('layouts.inc.frontend.app.flash-message')
    <div class="container">
        <div class="row">
            <div class="col-lg-12 text-center mt-100">
                <form wire:submit="redirectToGateway" class="form-horizontal" role="form">
                    <div class="row mb-4">
                        <div class="col-md-8 offset-md-2">
                            <div class="mb-3">
                                <div>
                                    <h5>Souhaitez-vous que je reformule cela de façon plus professionnelle ou adaptée à un ton particulier (formel, convivial, commercial) ?</h5>
                                </div>
                            </div>

                            <!-- Champs rendus visibles -->
                            <div class="form-group mb-2">
                                <label for="email">Email</label>
                                <input type="email" wire:model="email" class="form-control" id="email">
                            </div>
                            <div class="form-group mb-2">
                                <label for="amount">Montant</label>
                                <input type="number" wire:model="amount" class="form-control" id="amount">
                            </div>
                            <div class="form-group mb-2">
                                <label for="quantity">Quantité</label>
                                <input type="number" wire:model="quantity" class="form-control" id="quantity">
                            </div>
                            <div class="form-group mb-2">
                                <label for="currency">Devise</label>
                                <input type="text" wire:model="currency" class="form-control" id="currency">
                            </div>
                            <div class="form-group mb-2">
                                <label for="reference">Référence</label>
                                <input type="text" wire:model="reference" class="form-control" id="reference">
                            </div>
                        </div>

                        <div class="row ">
                            <div class="col-md-12 mt-100">
                                <button wire:loading.remove wire:target="redirectToGateway" class="btn btn-success btn-sm" type="submit">
                                    <i class="fa fa-plus-circle fa-lg"></i> Payer maintenant!
                                </button>
                                <button wire:loading wire:target="redirectToGateway" class="btn btn-success btn-sm" type="submit">
                                    <i class="fa fa-plus-circle fa-lg"></i> Redirection en cours
                                </button>
                                <button wire:loading.remove wire:target="handleGatewayCallback" wire:click="handleGatewayCallback" type="button" class="btn btn-primary btn-sm">
                                    <i class="fa fa-check-circle fa-lg"></i> Confirmer le paiement!
                                </button>
                                <button wire:loading wire:target="handleGatewayCallback" type="button" class="btn btn-primary btn-sm">
                                    <i class="fa fa-check-circle fa-lg"></i> Vérification du paiement..
                                </button>
                            </div>
                            <div class="col-md-12 mt-2">
                                <p wire:loading wire:target="redirectToGateway">Veuillez patienter pendant que vous êtes redirigé(e) vers la page de paiement..</p>
                                <p wire:loading wire:target="handleGatewayCallback">Veuillez patienter pendant que votre paiement est en cours de confirmation..</p>
                                <p>S'il vous plaît, ne rafraîchissez pas la page tant que le paiement n'est pas terminé et confirmé..</p>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</section>
