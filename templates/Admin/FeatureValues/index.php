<div class="container-fluid mt-5">
    <div class="row">
        <div class="col">
            <h1 class="h3 mb-2 text-gray-800">Options de caractéristique</h1>
        </div>

        <div class="col text-right">
            <?= $this->Html->link('<i class="fas fa-plus"></i> Ajouter', ['action' => 'add', $featureId], ['class' => 'btn btn-success', 'escape' => false]) ?>
        </div>
    </div>
        
    <div class="card shadow my-4">
        <div class="card-body">
            <?php // S'il n'y a pas de tableau à afficher
            if (!$featureValues->count()) : ?>
                <div class="alert alert-info">
                    Aucune option à afficher
                </div>

            <?php
            else : ?>
                <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th>Nom</th>
                                <th>Date de création</th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php // Boucle sur les caracteristiques
                            foreach ($featureValues as $featureValue) : ?>
                                <tr>
                                    <td class="align-middle"><?= $featureValue->name ?></td>
                                    <td class="align-middle"><?= $featureValue->created ?></td>
                                    <td class="text-right">
                                        <?= $this->Html->link('<i class="fas fa-edit"></i>', ['action' => 'edit', $featureValue->id], ['class' => 'btn btn-warning', 'escape' => false]) ?>
                                        <?= $this->Html->link('<i class="fas fa-trash"></i>', ['action' => 'delete', $featureValue->id], ['class' => 'btn btn-danger', 'escape' => false, 'confirm' => 'Etes-vous sûr de vouloir supprimer cette option ?']) ?>
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