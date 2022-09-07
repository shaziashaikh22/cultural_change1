<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Result Entity
 *
 * @property int $id
 * @property int|null $user_id
 * @property int|null $user_type_id
 * @property int|null $game_step_id
 * @property int|null $round_id
 * @property int|null $phase_id
 * @property string|null $game_code
 * @property int|null $score
 * @property string|null $given_time
 * @property string|null $start_time
 * @property string|null $end_time
 * @property string|null $canvas_image
 * @property \Cake\I18n\FrozenDate|null $date
 * @property string|null $status
 * @property \Cake\I18n\FrozenTime|null $created
 * @property \Cake\I18n\FrozenTime|null $modified
 *
 * @property \App\Model\Entity\User $user
 * @property \App\Model\Entity\UserType $user_type
 * @property \App\Model\Entity\Phase $phase
 * @property \App\Model\Entity\Round $round
 */
class Result extends Entity
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
        'user_type_id' => true,
        'game_step_id' => true,
        'round_id' => true,
        'phase_id' => true,
        'game_code' => true,
        'score' => true,
        'given_time' => true,
        'start_time' => true,
        'end_time' => true,
        'canvas_image' => true,
        'date' => true,
        'status' => true,
        'created' => true,
        'modified' => true,
        'user' => true,
        'user_type' => true,
        'phase' => true,
        'round' => true,
    ];
}
