<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * JobDescription Entity
 *
 * @property int $id
 * @property int|null $round_id
 * @property int|null $user_type_id
 * @property int|null $phase_id
 * @property string|null $description
 * @property string|null $project_info
 * @property string|null $status
 * @property \Cake\I18n\FrozenDate|null $created
 * @property \Cake\I18n\FrozenDate|null $modified
 *
 * @property \App\Model\Entity\Round $round
 * @property \App\Model\Entity\UserType $user_type
 * @property \App\Model\Entity\Phase $phase
 */
class JobDescription extends Entity
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
        'round_id' => true,
        'user_type_id' => true,
        'phase_id' => true,
        'description' => true,
        'project_info' => true,
        'status' => true,
        'created' => true,
        'modified' => true,
        'round' => true,
        'user_type' => true,
        'phase' => true,
    ];
}
