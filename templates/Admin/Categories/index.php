
<div class="container-fluid mt-5">
<div class="row">
    <div class="col">
    <h1 class="h3 mb-2 text-gray-800">Catégories</h1>
      </div>   
      <div class="col text-right">
      <?= $this->Html->link('<i class="fas fa-plus"></i> Ajouter',['action'=>'add'],['class'=>'btn btn-success', 'escape'=>false]) ?>

    </div>
</div>


<div class="card shadow my-4">
  <div class="card-header py-3">
    <h6 class="m-0 font-weight-bold text-primary">Liste des catégories</h6>
  </div>
  <div class="card-body">
  <?php // S'il n'y a pas de tableau à afficher
            if (!$categories->count()) : ?>
                <div class="alert alert-info">
                    Aucune catégorie à afficher
                </div>

            <?php else : ?>
                
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
            <?php //Boucle les catégories
            foreach ($categories as $categorie) : ?>
                <tr>
                    <td class="align-middle"><?= $categorie->name ?></td>
                    <td class="align-middle"><?= $categorie->created ?></td>
                    <td class="text-right">
                    <?= $this->Html->link('<i class="fas fa-edit"></i>', ['action' => 'edit', $categorie->id], ['class' => 'btn btn-warning', 'escape' => false]) ?>                
                    <?= $this->Html->link('<i class="fas fa-trash"></i>',['action'=>'delete',$categorie->id],['class'=>'btn btn-danger', 'escape'=>false, 'confirm'=>'Êtes vous sûr de vouloir supprimer cette catégorie ? ']) ?>
                <!-- Le escape=>false permet de dire a CakePhP que l'image font awesome est du HTML -->
                </td>
                                </tr>
                            <?php
                            endforeach; ?>
                        </tbody>
                    </table>
                </div>

                <nav class="d-inline-block">
                    <ul class="pagination">
                        <?= $this->Paginator->prev('< ') ?>
                        <?= $this->Paginator->numbers() ?>
                        <?= $this->Paginator->next(' >') ?>
                    </ul>
                </nav>
            <?php
            endif; ?>
        </div>
    </div>
</div>