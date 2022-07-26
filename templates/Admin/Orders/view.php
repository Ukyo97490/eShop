
<div class="container-fluid mt-5">
<div class="row">
    <div class="col">
    <h1 class="h3 mb-2 text-gray-800">Commande</h1>
      </div>   

<div class="col text-right">
      <?= $this->Html->link(' Retour',['action'=>'index'],['class'=>'btn btn-primary', 'escape'=>false]) ?>

    </div>
</div> 
<div class="card shadow my-4">
 <div class="card-body">
  <h4><?=$order->fullName?></h4>
  <p><?=$order->email?>
  <p><?=$order->adresse?>
  <div class="table-responsive mt-5">
      <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
        <thead>
          <tr>
            <th>Nom</th>
            <th>Prix</th>
            <th>Quantité</th>
            <th class="text-right">Total</th>
            
          </tr>
        </thead>
        <tbody>
            <?php //Boucle sur les commandes
            $total=0;

            foreach ($order->order_lists  as $order_list) : 
            $total += $order_list->quantity*$order_list->product->price; ?>
                <tr>
                    <td class="align-middle"><?= $order_list->product->name ?></td>
                    <td class="align-middle"><?= $order_list->product->price  ?></td>
                    <td class="align-middle"><?= $order_list->quantity  ?></td>
                    <td class="align-middle text-right font-weight-bold"><?= $this->Number->currency($order_list->quantity*$order_list->product->price)  ?></td>

                                </tr>
                            <?php
                            endforeach; ?>
                            <tr>
                              <td colspan="4" class="text-right font-weight-bold"><?=$this->Number->currency($total)?></td>
                            </tr>
                        </tbody>
                    </table>
                </div>

 </div>
        </div>
    </div>
</div>