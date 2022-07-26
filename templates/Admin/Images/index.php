<div class="container-fluid mt-5">
    <div class="row">
        <div class="col">
            <h1 class="h3 mb-2 text-gray-800">Photos</h1>
        </div>

        <div class="col text-right">
            <?= $this->Html->link('<i class="fas fa-plus"></i> Ajouter', ['action' => 'add', $productId], ['class' => 'btn btn-success', 'escape' => false]) ?>
        </div>
    </div>
        
    <div class="card shadow my-4">
        <div class="card-body">
            <?php // S'il n'y a pas de tableau à afficher
            if (!$images->count()) : ?>
                <div class="alert alert-info">
                    Aucune option à afficher
                </div>

            <?php
            else : ?>
                <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th>Image</th>
                                <th>ALT</th>
                                <th>Création</th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php // Boucle sur les caracteristiques
                            foreach ($images as $image) : ?>
                                <tr>
                                    <td class="align-middle text-center">
                                        <?= $this->Html->image('images/file/' . $image->file_dir . '/' . $image->file, ['style' => 'width: 100px;']) ?>
                                    </td>
                                    <td class="align-middle"><?= $image->alt ?></td>
                                    <td class="align-middle"><?= $image->created ?></td>
                                    <td class="align-middle text-right">
                                        <?= $this->Html->link('<i class="fas fa-edit"></i>', ['action' => 'edit', $image->id], ['class' => 'btn btn-warning', 'escape' => false]) ?>
                                        <?= $this->Html->link('<i class="fas fa-trash"></i>', ['action' => 'delete', $image->id], ['class' => 'btn btn-danger', 'escape' => false, 'confirm' => 'Etes-vous sûr de vouloir supprimer cette image ?']) ?>
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