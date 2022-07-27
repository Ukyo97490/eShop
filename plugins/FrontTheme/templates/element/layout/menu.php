<!-- Start Header Area -->
<header class="header_area sticky-header">
		<div class="main_menu">
			<nav class="navbar navbar-expand-lg navbar-light main_box">
				<div class="container">
					<!-- Brand and toggle get grouped for better mobile display -->
					<a class="navbar-brand logo_h" href="index.html">
						<?=$this->Html->image('logo.png') ?>
					</a>

					<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
					 aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
					</button>
					<!-- Collect the nav links, forms, and other content for toggling -->
					<div class="collapse navbar-collapse offset" id="navbarSupportedContent">
						<ul class="nav navbar-nav menu_nav ml-auto">
								<li class="nav-item active">
									<?=$this->Html->link('Accueil',['controller'=> 'Pages','action'=>'index'],['class'=>'nav-link']) ?>
								</li>

<?php
foreach ($categories as $idCategorie=> $categorie) { ?>
<li class="nav-item">
<?=$this->Html->link($categorie,['controller'=> 'Products','action'=>'index',$idCategorie],['class'=>'nav-link']) ?>
</li>
<?php } ?>
							
							<li class="nav-item"><a class="nav-link" href="contact.html">Contact</a></li>
						</ul>
					</div>
				</div>
			</nav>
		</div>
		
	</header>
	<!-- End Header Area -->