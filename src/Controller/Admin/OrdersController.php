<?php
declare(strict_types=1);

namespace App\Controller\Admin;

use App\Controller\Admin\AppController;
use App\Model\Entity\OrderList;

/**
 * Orders Controller
 *
 * @property \App\Model\Table\OrdersTable $Orders
 * @method \App\Model\Entity\Order[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class OrdersController extends AppController
{


     public $paginate = [
        'limit' =>5,
    ];

    public function initialize(): void
    {
        parent::initialize();
        $this->loadComponent('Paginator');
    }

    /**
     * Index method
     *
     * @return \Cake\Http\Response|null|void Renders view
     */
    public function index()
    {
        $orders = $this->paginate($this->Orders->find());

        $this->set(compact('orders'));
    }

 /**
     * View method
     */
    public function view($idOrder)
    {
        $order = $this->Orders->get($idOrder, ['contain' => ['OrderLists.Products']]);

        $this->set(compact('order'));
    }


}
