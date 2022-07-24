<?php
declare(strict_types=1);

namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * FeatureValuesProducts Model
 *
 * @property \App\Model\Table\FeatureValuesTable&\Cake\ORM\Association\BelongsTo $FeatureValues
 * @property \App\Model\Table\ProductsTable&\Cake\ORM\Association\BelongsTo $Products
 *
 * @method \App\Model\Entity\FeatureValuesProduct newEmptyEntity()
 * @method \App\Model\Entity\FeatureValuesProduct newEntity(array $data, array $options = [])
 * @method \App\Model\Entity\FeatureValuesProduct[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\FeatureValuesProduct get($primaryKey, $options = [])
 * @method \App\Model\Entity\FeatureValuesProduct findOrCreate($search, ?callable $callback = null, $options = [])
 * @method \App\Model\Entity\FeatureValuesProduct patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\FeatureValuesProduct[] patchEntities(iterable $entities, array $data, array $options = [])
 * @method \App\Model\Entity\FeatureValuesProduct|false save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\FeatureValuesProduct saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\FeatureValuesProduct[]|\Cake\Datasource\ResultSetInterface|false saveMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\FeatureValuesProduct[]|\Cake\Datasource\ResultSetInterface saveManyOrFail(iterable $entities, $options = [])
 * @method \App\Model\Entity\FeatureValuesProduct[]|\Cake\Datasource\ResultSetInterface|false deleteMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\FeatureValuesProduct[]|\Cake\Datasource\ResultSetInterface deleteManyOrFail(iterable $entities, $options = [])
 */
class FeatureValuesProductsTable extends Table
{
    /**
     * Initialize method
     *
     * @param array $config The configuration for the Table.
     * @return void
     */
    public function initialize(array $config): void
    {
        parent::initialize($config);

        $this->setTable('feature_values_products');
        $this->setDisplayField('id');
        $this->setPrimaryKey('id');

        $this->belongsTo('FeatureValues', [
            'foreignKey' => 'feature_value_id'
        ]);
        $this->belongsTo('Products', [
            'foreignKey' => 'product_id'
        ]);
    }

    /**
     * Default validation rules.
     *
     * @param \Cake\Validation\Validator $validator Validator instance.
     * @return \Cake\Validation\Validator
     */
    public function validationDefault(Validator $validator): Validator
    {
        $validator
            ->integer('feature_value_id')
            ->requirePresence('feature_value_id', 'create')
            ->notEmptyString('feature_value_id');

        $validator
            ->integer('product_id')
            ->requirePresence('product_id', 'create')
            ->notEmptyString('product_id');

        return $validator;
    }

    /**
     * Returns a rules checker object that will be used for validating
     * application integrity.
     *
     * @param \Cake\ORM\RulesChecker $rules The rules object to be modified.
     * @return \Cake\ORM\RulesChecker
     */
    public function buildRules(RulesChecker $rules): RulesChecker
    {
        $rules->add($rules->existsIn('feature_value_id', 'FeatureValues'), ['errorField' => 'feature_value_id']);
        $rules->add($rules->existsIn('product_id', 'Products'), ['errorField' => 'product_id']);

        return $rules;
    }
}
