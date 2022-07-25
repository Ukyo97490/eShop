<?php
declare(strict_types=1);

namespace App\Controller\Admin;

use App\Controller\Admin\AppController;

/**
 * FeatureValues Controller
 *
 * @property \App\Model\Table\FeatureValuesTable $FeatureValues
 * @method \App\Model\Entity\FeatureValue[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class FeatureValuesController extends AppController
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
    public function index($featureId)
    {
        $featureValues = $this->paginate($this->FeatureValues->find()->where(['feature_id' => $featureId, 'deleted IS NULL']));

        $this->set(compact('featureId', 'featureValues'));
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null|void Redirects on successful add, renders view otherwise.
     */
    public function add($featureId)
    {
        $featureValue = $this->FeatureValues->newEmptyEntity();

        if ($this->request->is('post')) {
            
            $featureValue = $this->FeatureValues->patchEntity(
                $featureValue,
                $this->request->getData() + ['feature_id' => $featureId]
            );

            if ($this->FeatureValues->save($featureValue)) {
                $this->Flash->success('Option de la caracteristique sauvegardée avec succès.');

                return $this->redirect(['action' => 'index', $featureId]);
            }

            $this->Flash->error('Option de la caracteristique non sauvegardée.');
        }

        $this->set(compact('featureValue'));
    }

    /**
     * Edit method
     *
     * @param string|null $id FeatureValue id.
     * @return \Cake\Http\Response|null|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $featureValue = $this->FeatureValues->get($id);

        if ($this->request->is(['patch', 'post', 'put'])) {

            $featureValue = $this->FeatureValues->patchEntity($featureValue, $this->request->getData());

            if ($this->FeatureValues->save($featureValue)) {
                $this->Flash->success('Option de la caracteristique sauvegardée avec succès.');

                return $this->redirect(['action' => 'index', $featureValue->feature_id]);
            }
            
            $this->Flash->error('Option de la caracteristique non sauvegardée.');
        }
        
        $this->set(compact('featureValue'));
    }

    /**
     * Delete method
     *
     * @param string|null $id FeatureValue id.
     * @return \Cake\Http\Response|null|void Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $featureValue = $this->FeatureValues->get($id);

        $featureValue = $this->FeatureValues->patchEntity($featureValue, ['deleted' => date('Y-m-d H:i:s')]);

        if ($this->FeatureValues->save($featureValue)) {
            $this->Flash->success('Option de la caracteristique supprimée avec succès.');
        } else {
            $this->Flash->error('Option de la caracteristique non supprimée.');
        }

        return $this->redirect(['action' => 'index', $featureValue->feature_id]);
    }
}
