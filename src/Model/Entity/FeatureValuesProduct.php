<?php
declare(strict_types=1);

namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * FeatureValuesProduct Entity
 *
 * @property int $id
 * @property int $feature_value_id
 * @property int $product_id
 *
 * @property \App\Model\Entity\FeatureValue $feature_value
 * @property \App\Model\Entity\Product $product
 */
class FeatureValuesProduct extends Entity
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
        'feature_value_id' => true,
        'product_id' => true,
        'feature_value' => true,
        'product' => true,
    ];
}
