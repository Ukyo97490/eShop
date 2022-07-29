<section class="banner-area organic-breadcrumb">
		<div class="container">
			<div class="breadcrumb-banner d-flex flex-wrap align-items-center justify-content-end">
				<div class="col-first">
					<h1><?=$product->name ?></h1>
					<nav class="d-flex align-items-center">
                    <?= $this->Html->link('Accueil<span class="lnr lnr-arrow-right"></span>', ['controller' => 'Pages', 'action' => 'index'], ['escape' => false]) ?>
                <?= $this->Html->link($product->category->name, ['controller' => 'Products', 'action' => 'index', $product->category->id]) ?>
                </nav>
				</div>
			</div>
		</div>
	</section>
	<div class="product_image_area mb-5">
		<div class="container">
			<div class="row s_product_inner">
				<div class="col-lg-6">
					<div class="s_Product_carousel">
                    <?php // Boucle sur les images
                            foreach ($product->images as $image){?>
                            <div class="single-prd-item">
                                <?= $this->Html->image('images/file/' . $image->file_dir . '/' . $image->file, ['class' => 'img-fluid']) ?>
                        </div>
                             <?php }?>
						
					</div>
				</div>
				<div class="col-lg-5 offset-lg-1">
					<div class="s_product_text">
                        <?= $this->Form->create()?>
						<h3 class="font-weight-bold"><?= $product->name?></h3>
						<h2><?= $product->price?> €</h2>
						<ul class="list">
							<li><span class="font-weight-bold">Category</span> : <?= $this->Html->link($product->category->name, ['controller' => 'Products', 'action' => 'index', $product->category->id]) ?></li>

							<?php // Boucle sur les caractéristiques (features)
                            foreach ($product->feature_values as $featureValue){?>
                                <li><span class="font-weight-bold"><?=$featureValue->feature->name?></span> : <?=$featureValue->name?></li>
                           <?php }?>
						</ul>
						<p><?= $product->description?></p>
						<div>
							<label>Quantité:</label></br>
                            <?=$this->Form->select('quantity',[1=>1,2=>2,3=>3,4=>4,5=>5])?>
						</div>
						<div class="card_area d-flex align-items-center mb-5">
                            <?= $this->Form->submit('Ajouter au panier', ['class' => 'primary-btn']) ?>
                        </div>
                    <?= $this->Form->end() ?>
                </div>
            </div>
        </div>
    </div>