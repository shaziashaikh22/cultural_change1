<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Shape Entity
 *
 * @property int $id
 * @property string|null $shape_name
 * @property string|null $shape_image
 * @property int|null $shape_group_id
 * @property \Cake\I18n\FrozenTime|null $created
 * @property \Cake\I18n\FrozenTime|null $modified
 *
 * @property \App\Model\Entity\ShapeGroup $shape_group
 */
class Shape extends Entity
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
        'shape_name' => true,
        'shape_image' => true,
        'width' => true,
        'height' => true,

        'shape_group_id' => true,
        'user_type_id' =>true,
        'score' =>true,
        'cutout_limit_r1' => true,
        'score_round2' => true,
        'cutout_limit_r2' => true,
        'created' => true,
        'modified' => true,
        'shape_group' => true,
        'user_type' => true,
    ];
}
