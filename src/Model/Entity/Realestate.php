<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Realestate Entity
 *
 * @property int $id
 * @property int $user_id
 * @property int $type_id
 * @property int $category_id
 * @property int $convenienceGrade_id
 * @property int $heatingType_id
 * @property int $conditionOfProperty_id
 * @property int $parking_id
 * @property float $price
 * @property int $rooms_numbers
 * @property int $half_room_numbers
 * @property int $floor_number
 * @property int $floor_number_sum
 * @property int $floor_area
 * @property int $land_area
 * @property bool $elevator
 * @property bool $external_storage
 * @property string $comment
 * @property \Cake\I18n\FrozenTime $premium
 * @property int $visitors
 * @property \Cake\I18n\FrozenDate $built_year
 * @property string $zipCode
 * @property string $state
 * @property string $city
 * @property string $street
 * @property string $houseNumber
 * @property string $district
 * @property float $latitude
 * @property float $longitude
 * @property bool $active
 * @property \Cake\I18n\FrozenTime $created
 * @property int $created_by
 * @property \Cake\I18n\FrozenTime $modified
 * @property int $modified_by
 *
 * @property \App\Model\Entity\User $user
 * @property \App\Model\Entity\Type $type
 * @property \App\Model\Entity\Category $category
 * @property \App\Model\Entity\Conveniencegrade $convenience_grade
 * @property \App\Model\Entity\Heatingtype $heating_type
 * @property \App\Model\Entity\Conditionofproperty $condition_of_property
 * @property \App\Model\Entity\Parking $parking
 * @property \App\Model\Entity\Image[] $images
 * @property \App\Model\Entity\Phone[] $phones
 */
class Realestate extends Entity
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
        'user_id' => true,
        'type_id' => true,
        'category_id' => true,
        'convenienceGrade_id' => true,
        'heatingType_id' => true,
        'conditionOfProperty_id' => true,
        'parking_id' => true,
        'price' => true,
        'rooms_numbers' => true,
        'half_room_numbers' => true,
        'floor_number' => true,
        'floor_number_sum' => true,
        'floor_area' => true,
        'land_area' => true,
        'elevator' => true,
        'external_storage' => true,
        'comment' => true,
        'premium' => true,
        'visitors' => true,
        'built_year' => true,
        'zipCode' => true,
        'state' => true,
        'city' => true,
        'street' => true,
        'houseNumber' => true,
        'district' => true,
        'latitude' => true,
        'longitude' => true,
        'active' => true,
        'created' => true,
        'created_by' => true,
        'modified' => true,
        'modified_by' => true,
        'user' => true,
        'type' => true,
        'category' => true,
        'convenience_grade' => true,
        'heating_type' => true,
        'condition_of_property' => true,
        'parking' => true,
        'images' => true,
        'phones' => true
    ];
}
