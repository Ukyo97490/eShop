
<div class="container-fluid mt-5">


<h1 class="h3 mb-2 text-gray-800">Catégories</h1>
<div class="card shadow mb-4">
  <div class="card-header py-3">
    <h6 class="m-0 font-weight-bold text-primary">Liste des catégories</h6>
  </div>
  <div class="card-body">
    <div class="table-responsive">
      <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
        <thead>
          <tr>
            <th>Nom</th>
            <th>Date de création</th>
            <th>Actions</th>
          </tr>
        </thead>
        <tbody>
          <tr>
            <?php //Boucle les catégories
            foreach ($categories as$categorie) : ?>
            <td class="align-middle"><?= $categorie->name ?></td>
            <td class="align-middle"><?= $categorie->created->format('d/m/Y') ?></td>
            <td class="text-right">
                <?= $this->Html->link('<i class="fas fa-edit"></i>',['action'=>'edit'],['class'=>'btn btn-warning', 'escape'=>false]) ?>
                <?= $this->Html->link('<i class="fas fa-trash"></i>',['action'=>'edit'],['class'=>'btn btn-danger', 'escape'=>false, 'confirm'=>'Êtes vous sûr de vouloir supprimer cette catégorie ? ']) ?>

                <!-- Le escape=>false permet de dire a CakePhP que l'image font awesome est du HTML -->
            </td>
            <?php endforeach;?>
          </tr>
          
        </tbody>
      </table>
    </div>
  </div>
</div>
</div>