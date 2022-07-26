<?php
declare(strict_types=1);

namespace App\Controller\Admin;

use App\Controller\Admin\AppController;

/**
 * Images Controller
 *
 * @property \App\Model\Table\ImagesTable $Images
 * @method \App\Model\Entity\Image[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class ImagesController extends AppController
{
    public $paginate = [
        'limit' => 2,
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
    public function index($productId)
    {
        $images = $this->paginate($this->Images->find()->where(['product_id' => $productId, 'deleted IS NULL']));

        $this->set(compact('productId', 'images'));
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null|void Redirects on successful add, renders view otherwise.
     */
    public function add($productId)
    {
        $image = $this->Images->newEmptyEntity();

        if ($this->request->is('post')) {
            
            $image = $this->Images->patchEntity(
                $image,
                $this->request->getData() + ['product_id' => $productId]
            );

            if ($this->Images->save($image)) {
                $this->Flash->success('Image sauvegardée avec succès.');

                return $this->redirect(['action' => 'index', $productId]);
            }

            $this->Flash->error('Image non sauvegardée.');
        }

        $this->set(compact('image'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Image id.
     * @return \Cake\Http\Response|null|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $image = $this->Images->get($id);

        if ($this->request->is(['patch', 'post', 'put'])) {

            $image = $this->Images->patchEntity($image, $this->request->getData());

            if ($this->Images->save($image)) {
                $this->Flash->success('Image sauvegardée avec succès.');

                return $this->redirect(['action' => 'index', $image->product_id]);
            }
            
            $this->Flash->error('Image non sauvegardée.');
        }
        
        $this->set(compact('image'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Image id.
     * @return \Cake\Http\Response|null|void Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $image = $this->Images->get($id);

        $image = $this->Images->patchEntity($image, ['deleted' => date('Y-m-d H:i:s')]);

        if ($this->Images->save($image)) {
            $this->Flash->success('Image supprimée avec succès.');
        } else {
            $this->Flash->error('Image non supprimée.');
        }

        return $this->redirect(['action' => 'index', $image->product_id]);
    }
}
