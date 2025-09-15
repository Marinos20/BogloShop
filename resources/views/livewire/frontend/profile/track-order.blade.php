<section class="tp-order-area pb-160">
    <div class="container">
        @if($order)
            <div class="tp-order-inner">
                <div class="row gx-0">
                    <div class="col-lg-6">
                        <div class="tp-order-details" data-bg-color="#4F3D97" style="background-color: rgb(79, 61, 151);">
                            <div class="tp-order-details-top text-center mb-70">
                                <div class="tp-order-details-icon">
                                    <span>
                                        <!-- SVG icon ici -->
                                    </span>
                                </div>
                                <div class="tp-order-details-content">
                                    <h3 class="tp-order-details-title">Votre commande est confirmée</h3>
                                    <p>Nous vous enverrons un e-mail de confirmation d’expédition dès que possible.<br>
                                       Dès que votre commande sera expédiée</p>
                                </div>
                            </div>
                            <div class="tp-order-details-item-wrapper">
                                <div class="row">
                                    <div class="col-sm-6">
                                        <div class="tp-order-details-item">
                                            <h4>Date de commande :</h4>
                                            <p>{{ $order->created_at->format('F j, Y') }}</p>
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="tp-order-details-item">
                                            <h4>Livraison prévue :</h4>
                                            <p>{{ $order->created_at->addDays(3)->format('F j, Y') }}</p>
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="tp-order-details-item">
                                            <h4>Numéro de commande :</h4>
                                            <p>#{{ $order->id }}</p>
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="tp-order-details-item">
                                            <h4>Méthode de paiement :</h4>
                                            <p>{{ $order->payment_mode }}</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="tp-order-info-wrapper">
                            <h4 class="tp-order-info-title">Détails de la commande</h4>
                            <div class="tp-order-info-list">
                                <ul>
                                    <!-- header -->
                                    <li class="tp-order-info-list-header">
                                        <h4>Produit</h4>
                                        <h4>Total</h4>
                                    </li>

                                    <!-- item list -->
                                    @foreach ($order->orderItems as $orderItem)
                                        <li class="tp-order-info-list-desc">
                                            <p>
                                                {{ $orderItem->products->name }}
                                                @if ($orderItem->color)
                                                    , Couleur: {{ $orderItem->color }}
                                                @endif
                                                @if ($orderItem->size)
                                                    , Taille: {{ $orderItem->size }}
                                                @endif
                                                <span> x {{ $orderItem->quantity }}</span>
                                            </p>
                                            <span>${{ number_format($orderItem->price * $orderItem->quantity, 2) }}</span>
                                        </li>
                                    @endforeach

                                    <!-- subtotal -->
                                    <li class="tp-order-info-list-subtotal">
                                        <span>Sous-total</span>
                                        <span>${{ number_format($order->total_price - 3000, 2) }}</span>
                                    </li>

                                    <!-- shipping -->
                                    <li class="tp-order-info-list-shipping">
                                        <span>Livraison</span>
                                        <div class="tp-order-info-list-shipping-item d-flex flex-column align-items-end">
                                            <span>${{ number_format(3000, 2) }}</span>
                                        </div>
                                    </li>

                                    <!-- total -->
                                    <li class="tp-order-info-list-total">
                                        <span>Total</span>
                                        <span>${{ number_format($order->total_price, 2) }}</span>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        @else
            <div class="alert alert-warning text-center">
                Aucun suivi disponible pour cette commande.
            </div>
        @endif
    </div>
</section>
