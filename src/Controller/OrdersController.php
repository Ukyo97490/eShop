<?php
declare(strict_types=1);

namespace App\Controller;

use Cake\Mailer\Mailer;

/**
 * Orders Controller
 *
 * @property \App\Model\Table\OrdersTable $Orders
 * @method \App\Model\Entity\Orders []|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class OrdersController extends AppController
{
    public function beforeFilter($event)
    {
        parent::beforeFilter($event);
// (On autorise la page aux visiteurs)
        $this->Authentication->addUnauthenticatedActions(['checkout']);
    }
    /**
     * Index method
         */
        public function checkout()
        {
            $this->loadModel('Products');
          $order = $this->Orders->newEmptyEntity();
          if ($this->getRequest()->is('post')){

          }
// Parcourir nos produits du panier
$listProducts=[];
foreach ($this->getRequest()->getSession()->read('cart') as $product){
    $listProducts[] =[
        'product'=>$this->Products->get($product['product_id']),
        'quantity'=>$product['quantity']
    ];
}
          $this->set(compact('order','listProducts'));
        }
         
}