<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * PhonesRealestate Entity
 *
 * @property int $id
 * @property int $phone_id
 * @property int $realestate_id
 *
 * @property \App\Model\Entity\Phone $phone
 * @property \App\Model\Entity\Realestate $realestate
 */
class PhonesRealestate extends Entity
{

    /**
     * Fields that can be mass assigned using newEntity() or patchEntity().
     *
     * Note that when '*' is set to true, this allows all unspecified fields to
     * be mass assigned. For security purposes, it is advised to set '*' to false
     * (or remove it), and explicitly make individual fields accessible as needed.
     *
     * @var array
     */
    protected $_accessible = [
        'phone_id' => true,
        'realestate_id' => true,
        'phone' => true,
        'realestate' => true
    ];
}
