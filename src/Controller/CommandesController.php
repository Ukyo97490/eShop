<?php
declare(strict_types=1);

namespace App\Controller;

/**
 * Commandes Controller
 *
 * @property \App\Model\Table\CommandesTable $Commandes
 * @method \App\Model\Entity\Product[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class CommandesController extends AppController
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


    }

}
