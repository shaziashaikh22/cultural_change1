<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * ShapeGroup Entity
 *
 * @property int $id
 * @property string|null $shape_group_name
 * @property string|null $shape_group_description
 * @property \Cake\I18n\FrozenTime|null $created
 * @property \Cake\I18n\FrozenTime|null $modified
 *
 * @property \App\Model\Entity\OnlineGame[] $online_games
 * @property \App\Model\Entity\Shape[] $shapes
 */
class ShapeGroup extends Entity
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
        'shape_group_name' => true,
        'shape_group_description' => true,
        'created' => true,
        'modified' => true,
        'online_games' => true,
        'shapes' => true,
        'user_type' => true,

    ];
}
