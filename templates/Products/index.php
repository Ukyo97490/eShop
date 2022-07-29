<!-- Start Banner Area -->
<section class="banner-area organic-breadcrumb">
		<div class="container">
			<div class="breadcrumb-banner d-flex flex-wrap align-items-center justify-content-end">
				<div class="col-first">
					<h1><?=$categorie->name ?></h1>
				</div>
			</div>
		</div>
	</section>
	<!-- End Banner Area -->



	<div class="container">
		<div class="row">
			<div class="col-xl-3 col-lg-4 col-md-5">
				<div class="sidebar-categories">
					<div class="head">Catégories</div>
					<ul class="main-categories">
                    <!-- Liste des catégories -->
                    <?php 
foreach ($categories as $idCategorie=> $categorie) { ?>
<li class="main-nav-list"> 
<?=$this->Html->link($categorie,['controller'=> 'Products','action'=>'index',$idCategorie],['class'=>'nav-link']) ?>
</li>
<?php } ?>	
                    </ul>
                </div>
                
                <?=$this->Form->create(null,['type'=>'get','class'=>'submitOnChange']) ?>


				<div class="sidebar-filter mt-50">
					<div class="top-filter-head">Filtres</div>
					<div class="common-filter border-0 pb-5">
						<div class="head">Marque</div>
                        <?=$this->Form->select('filtre_brand',$brands,['label'=>false, 'empty'=>'Choisir une marque'])?>
						
					</div>
                    <hr/>
					<div class="common-filter border-0 ">
						<div class="head">Processeur</div>
                        <?=$this->Form->select('filtre_processor',$processors,['label'=>false, 'empty'=>'Choisir un processeur'])?>

					</div>
				</div>
                <?=$this->Form->end() ?>
			</div>
			<div class="col-xl-9 col-lg-8 col-md-7">
				<!-- Start Best Seller -->
				<section class="lattest-product-area pb-40 category-list">
					<div class="row">
						<?php // Liste des produits
						foreach ($products as $product) { ?>
						<div class="col-lg-4 col-md-6">
							<div class="single-product">
								<img class="img-fluid" src="img/product/p1.jpg" alt="">

								<?= $this->Html->image('images/file/' . $product->images[0]->file_dir . '/' . $product->images[0]->file) ?>
								<div class="product-details">
									<h6><?= $this->Html->link($product->name,['controller'=>'Products','action'=>'view',$product->id]) ?></h6>
									<div class="price">
										<h6><?= $product->price ?></h6>
									</div>
								</div>
							</div>
						</div>
						
						<?php }?>
						
					</div>
				</section>
		
				
			</div>
		</div>
	</div>

	