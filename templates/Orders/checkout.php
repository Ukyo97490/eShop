<!-- Start Banner Area -->
<section class="banner-area organic-breadcrumb">
        <div class="container">
            <div class="breadcrumb-banner d-flex flex-wrap align-items-center justify-content-end">
                <div class="col-first">
                    <h1>Panier</h1>
                </div>
            </div>
        </div>
    </section>
    <!-- End Banner Area -->

    <!--================Checkout Area =================-->
    <section class="checkout_area section_gap">
        <div class="container">
        <?= $this->Form->create($order) ?>
            <div class="billing_details">
                <div class="row">
                    <div class="col-lg-8">
                        <h3>Vos informations</h3>
                        <div class="row contact_form">
                            <div class="col-md-6 form-group">
                                <label for="prenom">Prénom</label>
                                <?= $this->Form->input('prenom', ['class' => 'form-control']) ?>
                                <span class="placeholder" data-placeholder="Prénom"></span>
                            </div>
                            <div class="col-md-6 form-group">
                                <label for="prenom">Nom</label>
                                <?= $this->Form->input('nom', ['class' => 'form-control']) ?>
                            </div>
                            <div class="col-md-6 form-group">
                                <label for="prenom">Email</label>
                                <?= $this->Form->input('email', ['class' => 'form-control']) ?>
                            </div>
                            <div class="col-md-12 form-group">
                                <label for="adresse">Adresse</label>
                                <?= $this->Form->input('adresse', ['class' => 'form-control']) ?>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="order_box">
                            <h2>Mes produits</h2>
                            <ul class="list">
                                <li><a href="#">Produit <span>Total</span></a></li>

                                <?php // Parcourir tous mes produits en session
                                $total = 0;
                                foreach ($listProducts as $product) {
                                    $total += $product['product']['price'] * $product['quantity'];
                                    ?>
                                    <li>
                                        <?= $this->Html->link('<i class="fa fa-times text-danger"></i>', ['controller' => 'Products', 'action' => 'deleteCart', $product['product']['id']], ['escape' => false, 'style' => 'display: inline;']) ?>
                                        <a href="#" style="display: inline;">
                                            <?= $product['product']['name'] ?> <span class="middle">x <?= $product['quantity'] ?></span> <span class="last"><?= $product['product']['price'] * $product['quantity'] ?> €</span>
                                        </a>
                                    </li>
                                <?php
                                } ?>
                            </ul>
                            <ul class="list list_2">
                                <li><a href="#">Total <span><?= $total ?> €</span></a></li>
                            </ul>
                            <?= $this->Form->submit('Payer', ['class' => 'primary-btn']) ?>
                        </div>
                    </div>
                </div>
            </div>
        <?= $this->Form->end() ?>
    </div>
</section>