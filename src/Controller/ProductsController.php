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
        $this->Authentication->addUnauthenticatedActions(['index','view']);
    }
    /**
     * Index method
         */
    public function index($categorieId)
    { 
//Catégorie
$categorie = $this->Products->Categories->get($categorieId);

//Liste des produits
$products=$this->Products->find()->contain(['Images'])->where(['category_id'=>$categorieId]);



//Si filtre_processeurs
$filter_processor=$this->getRequest()->getQuery('filter_processor');
if(!empty($filter_processor)){
    $products->innerJoinWith('FeatureValuesProducts',function($q)use($filter_processor){
        return $q->where(['feature_value_id'=>$filter_processor]);
    });
}

//Si filtre_marques
$filtre_brand=$this->getRequest()->getQuery('filtre_brand');
if(!empty($filtre_brand)){
    $products->innerJoinWith('FeatureValuesProducts',function($q)use($filtre_brand){
        return $q->where(['feature_value_id'=>$filtre_brand]);
    });
}


// Récup des marques
$this->loadModel('FeatureValues');
$brands=$this->FeatureValues->find(
    'list',[
        'keyField'=>'id',
        'valueField'=>'name'       
])
->where(['feature_id'=>  FEATURE_BRAND_ID, 'deleted IS NULL']);


// Récup des processeurs
$processors=$this->FeatureValues->find(
    'list',[
        'keyField'=>'id',
        'valueField'=>'name'       
])
->where(['feature_id'=> FEATURE_PROCESSOR_ID, 'deleted IS NULL']);



$this->set(compact('categorie','brands','processors' ));
        $this->set(['products'=>$this->paginate($products)]);
    }

    /**
     * View method
     *
     * @param string|null $id Product id.
     * @return \Cake\Http\Response|null|void Renders view
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id)
    {
        $product = $this->Products->get($id, [
            'contain' => ['Categories', 'FeatureValues.Features', 'Images'],
        ]);

        $this->set('product',$product);
    }
}
