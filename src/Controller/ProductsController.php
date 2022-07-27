<?php
declare(strict_types=1);

namespace App\Controller;

/**
 * Products Controller
 *
 * @property \App\Model\Table\ProductsTable $Products
 * @method \App\Model\Entity\Product[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class ProductsController extends AppController
{
    public function beforeFilter($event)
    {
        parent::beforeFilter($event);
// (On autorise la page aux visiteurs)
        $this->Authentication->addUnauthenticatedActions(['index']);
    }
    /**
     * Index method
     *
     */
    public function index($categorieId)
    {
        // Catégorie
$categorie=$this->Products->Categories->get($categorieId);
        // Liste des Produits 
        $products =$this->Products->find()->where(['category_id'=>$categorieId]);
        $this->set(compact('categorie'));
        $this->set(['products'=>$this->paginate($this->Products)]);


    }

    /**
     * View method
     *
     * @param string|null $id Product id.
     * @return \Cake\Http\Response|null|void Renders view
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $product = $this->Products->get($id, [
            'contain' => ['Categories', 'FeatureValues', 'Images', 'OrderLists'],
        ]);

        $this->set(compact('product'));
    }

    
}
