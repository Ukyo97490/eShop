<!-- Sidebar -->
<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

<!-- Sidebar - Brand -->
<a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.html">
  <div class="sidebar-brand-icon rotate-n-15">
    <i class="fas fa-laugh-wink"></i>
  </div>
  <div class="sidebar-brand-text mx-3">Pannel Administration</div>
</a>

<!-- Divider -->
<hr class="sidebar-divider my-0">

<!-- Nav Item - Dashboard -->
<li class="nav-item active">
    <?= $this->Html->link('<i class="fas fa-truck"></i> Commandes', ['controller' => 'Commandes', 'action' => 'index'], ['class' => 'nav-link', 'escape' => false]) ?>

    <?= $this->Html->link('<i class="fas fa-list"></i> Catégories', ['controller' => 'Categories', 'action' => 'index'], ['class' => 'nav-link', 'escape' => false]) ?>

    <?= $this->Html->link('<i class="fas fa-shopping-cart"></i> Produits', ['controller' => 'Products', 'action' => 'index'], ['class' => 'nav-link', 'escape' => false]) ?>

    <?= $this->Html->link('<i class="fas fa-cogs"></i> Caractéristiques', ['controller' => 'Features', 'action' => 'index'], ['class' => 'nav-link', 'escape' => false]) ?>

    <?= $this->Html->link('<i class="fas fa-user"></i> Déconnexion', ['controller' => 'Users', 'action' => 'logout'], ['class' => 'nav-link', 'escape' => false]) ?>
</li>

</ul>