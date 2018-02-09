<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;
use Cake\Auth\DefaultPasswordHasher;

/**
 * User Entity
 *
 * @property int $id
 * @property string $username
 * @property string $password
 * @property string $email
 * @property string $first_name
 * @property string $last_name
 * @property string $avatar
 * @property string $biography
 * @property string $signature
 * @property string $language
 * @property \Cake\I18n\FrozenTime $password_code_expire
 * @property int $password_reset_count
 * @property string $password_code
 * @property \Cake\I18n\FrozenTime $tos_date
 * @property string $token
 * @property string $register_ip
 * @property string $last_login_ip
 * @property \Cake\I18n\FrozenTime $last_login
 * @property bool $active
 * @property \Cake\I18n\FrozenTime $created
 * @property string $created_by
 * @property \Cake\I18n\FrozenTime $modified
 * @property string $modified_by
 *
 * @property \App\Model\Entity\Realestate[] $realestates
 * @property \App\Model\Entity\Phone[] $phones
 * @property \App\Model\Entity\Role[] $roles
 */
class User extends Entity
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
        'username' => true,
        'password' => true,
        'email' => true,
        'first_name' => true,
        'last_name' => true,
        'avatar' => true,
        'biography' => true,
        'signature' => true,
        'language' => true,
        'password_code_expire' => true,
        'password_reset_count' => true,
        'password_code' => true,
        'tos_date' => true,
        'token' => true,
        'register_ip' => true,
        'last_login_ip' => true,
        'last_login' => true,
        'active' => true,
        'created' => true,
        'created_by' => true,
        'modified' => true,
        'modified_by' => true,
        'realestates' => true,
        'phones' => true,
        'roles' => true
    ];

    /**
     * Fields that are excluded from JSON versions of the entity.
     *
     * @var array
     */
    protected $_hidden = [
        'password',
        'token'
    ];

    /**
     * Hash the password before to save.
     *
     * @param string $password Password to be hashed.
     *
     * @return string
     */
    protected function _setPassword($password)
    {
        return (new DefaultPasswordHasher)->hash($password);

    }
}
