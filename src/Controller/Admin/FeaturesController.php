<?php
declare(strict_types=1);

namespace App\Controller\Admin;

use App\Controller\Admin\AppController;

/**
 * Features Controller
 *
 * @property \App\Model\Table\FeaturesTable $Features
 * @method \App\Model\Entity\Feature[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class FeaturesController extends AppController
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
        $features = $this->paginate($this->Features->find()->where(['deleted IS NULL']));

        $this->set(compact('features'));
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $feature = $this->Features->newEmptyEntity();
        if ($this->request->is('post')) {

            $feature = $this->Features->patchEntity($feature, $this->request->getData());

            if ($this->Features->save($feature)) {
                $this->Flash->success('Caractéristique ajoutée avec succès. ');

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error('Caractéristique non ajoutée. ');
        }
        $this->set(compact('feature'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Feature id.
     * @return \Cake\Http\Response|null|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $feature = $this->Features->get($id);

        if ($this->request->is(['patch', 'post', 'put'])) {
            $feature = $this->Features->patchEntity($feature, $this->request->getData());
            if ($this->Features->save($feature)) {
                $this->Flash->success('Caractéristique sauvegardée avec succès.');

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error('Caractéristique non sauvegardée. ');
        }
        $this->set(compact('feature'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Feature id.
     * @return \Cake\Http\Response|null|void Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $feature = $this->Features->get($id);

        $feature = $this->Features->patchEntity($feature, ['deleted' => date('Y-m-d H:i:s')]);

        if ($this->Features->save($feature)) {
            $this->Flash->success('Caractéristique supprimée avec succès.');
        } else {
            $this->Flash->error('Caractéristique non supprimée.');
        }

        return $this->redirect(['action' => 'index']);
    }
}
