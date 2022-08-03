<?php
declare(strict_types=1);

namespace App\Controller;

use Cake\Mailer\Mailer;

/**
 * Orders Controller
 *
 * @property \App\Model\Table\OrdersTable $Orders
 * @method \App\Model\Entity\Order[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class OrdersController extends AppController
{
    public function beforeFilter($event)
    {
        parent::beforeFilter($event);
// (On autorise la page aux visiteurs)
        $this->Authentication->addUnauthenticatedActions(['checkout', 'confirmation']);
    }
    /**
     * Index method
         */
        public function checkout()
        {
            // Parcourir les produits du panier
            $this->loadModel('Products');
            $listProducts = [];
            if (!empty($this->getRequest()->getSession()->read('cart'))) {
                foreach ($this->getRequest()->getSession()->read('cart') as $idProduct => $quantity) {
                    $listProducts[] = [
                        'product' => $this->Products->get($idProduct),
                        'quantity' => $quantity
                    ];
                }
            }
    
            $order = $this->Orders->newEmptyEntity();
    
            if ($this->getRequest()->is('post')) {
                $datas = $this->getRequest()->getData();
                $datas['order_lists'] = [];
                foreach ($this->getRequest()->getSession()->read('cart') as $idProduct => $quantity) {
                    $datas['order_lists'][] = [
                        'product_id' => $idProduct,
                        'quantity' => $quantity
                    ];
                }
    
                $order = $this->Orders->patchEntity(
                    $order,
                    $datas,
                    ['associated' => ['OrderLists']]
                );
                
                if ($this->Orders->save($order)) {
                    // Suppression du panier en session
                    $this->getRequest()->getSession()->delete('cart');
    
                    // Récupération de la commande avec ses lignes et les produits associés
                $order = $this->Orders->get($order->id, ['contain' => ['OrderLists.Products']]);
                
                // Envoi de mail
                $mailer = new Mailer();
                $mailer
                    ->setEmailFormat('html')
                    ->setTo($order->email)
                    ->setSubject('Confirmation de commande')
                    ->setFrom('contact@smartphone-sore.com')
                    ->setViewVars(compact('commande'))
                    ->viewBuilder()
                        ->setTemplate('confirmation_commande');

                $mailer->deliver();

                return $this->redirect(['action' => 'confirmation']);
            }
        }

        $this->set(compact('order', 'listProducts'));
    }

    public function confirmation()
    {
    }
}