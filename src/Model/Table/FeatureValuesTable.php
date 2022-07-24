<?php
declare(strict_types=1);

namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * FeatureValues Model
 *
 * @property \App\Model\Table\FeaturesTable&\Cake\ORM\Association\BelongsTo $Features
 * @property \App\Model\Table\ProductsTable&\Cake\ORM\Association\BelongsToMany $Products
 *
 * @method \App\Model\Entity\FeatureValue newEmptyEntity()
 * @method \App\Model\Entity\FeatureValue newEntity(array $data, array $options = [])
 * @method \App\Model\Entity\FeatureValue[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\FeatureValue get($primaryKey, $options = [])
 * @method \App\Model\Entity\FeatureValue findOrCreate($search, ?callable $callback = null, $options = [])
 * @method \App\Model\Entity\FeatureValue patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\FeatureValue[] patchEntities(iterable $entities, array $data, array $options = [])
 * @method \App\Model\Entity\FeatureValue|false save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\FeatureValue saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\FeatureValue[]|\Cake\Datasource\ResultSetInterface|false saveMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\FeatureValue[]|\Cake\Datasource\ResultSetInterface saveManyOrFail(iterable $entities, $options = [])
 * @method \App\Model\Entity\FeatureValue[]|\Cake\Datasource\ResultSetInterface|false deleteMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\FeatureValue[]|\Cake\Datasource\ResultSetInterface deleteManyOrFail(iterable $entities, $options = [])
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */
class FeatureValuesTable extends Table
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

        $this->setTable('feature_values');
        $this->setDisplayField('id');
        $this->setPrimaryKey('id');

        $this->addBehavior('Timestamp');

        $this->belongsTo('Features', [
            'foreignKey' => 'feature_id',
            'joinType' => 'INNER',
        ]);
        $this->belongsToMany('Products', [
            'foreignKey' => 'feature_value_id',
            'targetForeignKey' => 'product_id',
            'joinTable' => 'feature_values_products',
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
            ->scalar('nom')
            ->maxLength('nom', 100)
            ->requirePresence('nom', 'create')
            ->notEmptyString('nom');

        $validator
            ->integer('feature_id')
            ->requirePresence('feature_id', 'create')
            ->notEmptyString('feature_id');

        $validator
            ->dateTime('deleted')
            ->allowEmptyDateTime('deleted');

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
        $rules->add($rules->existsIn('feature_id', 'Features'), ['errorField' => 'feature_id']);

        return $rules;
    }
}
