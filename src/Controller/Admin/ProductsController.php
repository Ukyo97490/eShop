<?php
declare(strict_types=1);

namespace App\Controller\Admin;

use App\Controller\Admin\AppController;

/**
 * Products Controller
 *
 * @property \App\Model\Table\ProductsTable $Products
 * @method \App\Model\Entity\Product[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class ProductsController extends AppController
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
        $products = $this->paginate(
            $this->Products->find()
            ->contain(['Categories'])
            ->where(['Products.deleted IS NULL'])
        );

// Récupération des catégories 
// $this->loadModel('Categories');
$categories=$this->Products->Categories->find('list',['keyfield'=>'id','valuefield'=>'name'])
->where(['deleted IS NULL'])
->toArray();


        $this->set(compact('products'));
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $product = $this->Products->newEmptyEntity();
        if ($this->request->is('post')) {

            $product = $this->Products->patchEntity($product, $this->request->getData());

            if ($this->Products->save($product)) {
                $this->Flash->success('Produit ajouté avec succès. ');

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error('Produit non ajouté. ');
        }

// Récupération de la liste des catégories
$categories = $this->Products->Categories->find('list', ['keyField' => 'id', 'valueField' => 'name'])
->where(['deleted IS NULL'])
->toArray();

        $this->set(compact('product', 'categories'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Product id.
     * @return \Cake\Http\Response|null|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $product = $this->Products->get($id);

        if ($this->request->is(['patch', 'post', 'put'])) {
            $product = $this->Products->patchEntity($product, $this->request->getData());
            if ($this->Products->save($product)) {
                $this->Flash->success('Produit sauvegardé avec succès.');

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error('Produit non sauvegardé. ');
        }
        $this->set(compact('product'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Product id.
     * @return \Cake\Http\Response|null|void Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $product = $this->Products->get($id);

        $product = $this->Products->patchEntity($product, ['deleted' => date('Y-m-d H:i:s')]);

        if ($this->Products->save($product)) {
            $this->Flash->success('Produit supprimé avec succès.');
        } else {
            $this->Flash->error('Produit non supprimé.');
        }

        return $this->redirect(['action' => 'index']);
    }
}
