<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * UserType Entity
 *
 * @property int $id
 * @property string|null $type_name
 * @property int|null $access_id
 * @property string|null $type_description
 * @property \Cake\I18n\FrozenTime|null $created
 * @property \Cake\I18n\FrozenTime|null $modified
 *
 * @property \App\Model\Entity\Access $access
 * @property \App\Model\Entity\User[] $users
 */
class UserType extends Entity
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
        'type_name' => true,
        'access_id' => true,
        'type_description' => true,
        'upload_image' => true,
        'user_type_status' => true,
        'created' => true,
        'modified' => true,
        'access' => true,
        'users' => true,
    ];
}
