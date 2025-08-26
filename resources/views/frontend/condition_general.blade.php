@extends('layouts.app')

@section('content')
<section class="tp-seller-area pb-140 mt-5 py-5 bg-light">
    <div class="container">
        <div class="row">
            <div class="col-xl-12">
                <div class="tp-section-title-wrapper-2 mb-50 text-center">
                    <span class="tp-section-title-pre-2">
                        Conditions Générales de Vente
                        <svg width="82" height="22" viewBox="0 0 82 22" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M81 14.5798C0.890564 -8.05914 -5.81154 0.0503902 5.00322 21" stroke="currentColor" stroke-opacity="0.3" stroke-width="2" stroke-miterlimit="3.8637" stroke-linecap="round"></path>
                        </svg>
                    </span>
                    <h3 class="tp-section-title-2">Vente de Produits Spirituels</h3>
                </div>
            </div>
        </div>

        <div class="row justify-content-center">
            <div class="col-lg-10">
                <div class="p-4 bg-white rounded shadow-sm">

                    <p><strong>1. Objet</strong><br>
                        Les présentes Conditions Générales de Vente (CGV) régissent les ventes de produits spirituels proposés sur le site <strong>Boglo.shop</strong>.  
                        En validant une commande, vous acceptez sans réserve ces conditions.
                    </p>

                    <p><strong>2. Produits</strong><br>
                        Les produits proposés (savons mystiques, bagues, talismans, encens, parfums spirituels, etc.) sont décrits avec la plus grande précision possible.  
                        Les photos sont fournies à titre illustratif. Chaque produit est destiné à un usage spirituel, symbolique ou traditionnel.
                    </p>

                    <p><strong>3. Commandes</strong><br>
                        Toute commande validée sur notre site implique l’obligation de paiement.  
                        Vous devez fournir des informations exactes et complètes pour le traitement et la livraison.  
                        Nous nous réservons le droit de refuser une commande en cas de fraude ou de suspicion d’usage abusif.
                    </p>

                    <p><strong>4. Prix</strong><br>
                        Les prix indiqués sont en monnaie locale et incluent toutes taxes applicables.  
                        Les frais de livraison sont précisés lors de la validation de la commande.
                    </p>

                    <p><strong>5. Paiement</strong><br>
                        Le règlement s’effectue par les moyens de paiement sécurisés proposés sur le site (mobile money, cartes bancaires, etc.).  
                        La commande est considérée comme confirmée uniquement après validation du paiement.
                    </p>

                    <p><strong>6. Livraison</strong><br>
                        Les produits sont expédiés à l’adresse indiquée lors de la commande.  
                        Nous assurons un envoi discret afin de protéger votre confidentialité.  
                        Les délais de livraison varient selon votre localisation et le service de transport.
                    </p>

                    <p><strong>7. Droit de rétractation</strong><br>
                        Pour des raisons d’hygiène et de respect spirituel, certains produits (savons, huiles, encens, talismans personnalisés) ne peuvent pas être retournés une fois utilisés ou ouverts.  
                        Si le produit est endommagé à la réception, vous pouvez demander un échange ou un remboursement sous 7 jours.
                    </p>

                    <p><strong>8. Responsabilité</strong><br>
                        Nos produits sont proposés dans un cadre spirituel et traditionnel.  
                        Ils ne constituent en aucun cas un traitement médical ou une garantie de résultat.  
                        L’acheteur reste responsable de l’usage qu’il fait des produits.
                    </p>

                    <p><strong>9. Confidentialité</strong><br>
                        Nous respectons la confidentialité de nos clients. Les données personnelles collectées sont traitées conformément à notre <a href="{{ url('/policy') }}">Politique de Confidentialité</a>.
                    </p>

                    <p><strong>10. Force majeure</strong><br>
                        Nous ne saurions être tenus responsables en cas de retard ou d’impossibilité de livraison liés à un événement de force majeure (catastrophes, grèves, problèmes de transport, etc.).
                    </p>

                    <p><strong>11. Modifications</strong><br>
                        Nous nous réservons le droit de modifier les présentes conditions à tout moment. Les nouvelles CGV seront applicables dès leur publication en ligne.
                    </p>

                    <p><strong>12. Contact</strong><br>
                        Pour toute question relative à vos commandes ou aux présentes conditions générales, vous pouvez nous écrire à :  
                        <a href="mailto:medium@boglo.shop" class="fw-bold text-dark">medium@boglo.shop</a>
                    </p>

                </div>
            </div>
        </div>
    </div>
</section>
@endsection
