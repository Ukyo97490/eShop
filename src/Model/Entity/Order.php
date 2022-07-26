<?php
declare(strict_types=1);

namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Order Entity
 *
 * @property int $id
 * @property string $prenom
 * @property string $nom
 * @property string $email
 * @property string $adresse
 * @property \Cake\I18n\FrozenTime $created
 * @property \Cake\I18n\FrozenTime $modified
 *
 * @property \App\Model\Entity\OrderList[] $order_lists
 */
class Order extends Entity
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
        'prenom' => true,
        'nom' => true,
        'email' => true,
        'adresse' => true,
        'created' => true,
        'modified' => true,
        'order_lists' => true,
    ];

    public function _getFullName()
    {
        return ucfirst($this->prenom) .' '. strtoupper($this->nom);
    }
}
