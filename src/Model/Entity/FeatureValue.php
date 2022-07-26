<?php
declare(strict_types=1);

namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * FeatureValue Entity
 *
 * @property int $id
 * @property string $name
 * @property int $feature_id
 * @property \Cake\I18n\FrozenTime $created
 * @property \Cake\I18n\FrozenTime $modified
 * @property \Cake\I18n\FrozenTime|null $deleted
 *
 * @property \App\Model\Entity\Feature $feature
 * @property \App\Model\Entity\Product[] $products
 */
class FeatureValue extends Entity
{
    /**
     * Fields that can be mass assigned using newEntity() or patchEntity().
     *
     * Note that when '*' is set to true, this allows all unspecified fields to
     * be mass assigned. For security purposes, it is advised to set '*' to false
     * (or remove it), and explicitly make individual fields accessible as needed.
     *
     * @var array<string, bool>
     */
    protected $_accessible = [
        'name' => true,
        'feature_id' => true,
        'created' => true,
        'modified' => true,
        'deleted' => true,
        'feature' => true,
        'products' => true,
    ];
}
