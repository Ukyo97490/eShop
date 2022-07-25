<?php
declare(strict_types=1);

namespace App\Controller\Admin;

use App\Controller\Admin\AppController;

/**
 * Categories Controller
 *
 * @property \App\Model\Table\CategoriesTable $Categories
 * @method \App\Model\Entity\Category[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class CategoriesController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null|void Renders view
     */
    public function index()
    {
        $categories = $this->paginate($this->Categories->find()->where(['deleted IS NULL']));

        $this->set(compact('categories'));
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $category = $this->Categories->newEmptyEntity();
        if ($this->request->is('post')) {

            $category = $this->Categories->patchEntity($category, $this->request->getData());

            if ($this->Categories->save($category)) {
                $this->Flash->success('Catégorie ajoutée avec succès. ');

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error('Catégorie non ajoutée. ');
        }
        $this->set(compact('category'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Category id.
     * @return \Cake\Http\Response|null|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $category = $this->Categories->get($id);

        if ($this->request->is(['patch', 'post', 'put'])) {
            $category = $this->Categories->patchEntity($category, $this->request->getData());
            if ($this->Categories->save($category)) {
                $this->Flash->success(__('The category has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The category could not be saved. Please, try again.'));
        }
        $this->set(compact('category'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Category id.
     * @return \Cake\Http\Response|null|void Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $category = $this->Categories->get($id);

        $category = $this->Categories->patchEntity($category, ['deleted' => date('Y-m-d H:i:s')]);

        if ($this->Categories->save($category)) {
            $this->Flash->success('Catégorie supprimée avec succès.');
        } else {
            $this->Flash->error('Catégorie non supprimée.');
        }

        return $this->redirect(['action' => 'index']);
    }
}
