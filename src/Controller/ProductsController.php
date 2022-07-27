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

//Récup des Marques pour les filtres
$this->loadModel('FeatureValues');
$brands=$this->FeatureValues->find(
 'list',[
'keyfield'=>'id',
'valueField'=>'name'
])
->where(['feature_id'=>FEATURE_BRAND_ID ,'deleted IS NULL']);
// FEATURE_BRAND_ID est une constante défini dans le fichier config>bootstrap php ou le numéro correspond au feature id de la BDD

//Récup des Processeurs pour les filtres
$processors=$this->FeatureValues->find(
    'list',[
   'keyfield'=>'id',
   'valueField'=>'name'
   ])
//    ->where(['feature_id'=>14,'deleted IS NULL']);
->where(['feature_id'=>FEATURE_PROCESSOR_ID,'deleted IS NULL']);
   

    
        $this->set(compact('categorie','brands','processors'));
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
