<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * OnlineGameHistory Entity
 *
 * @property int $id
 * @property int|null $online_game_id
 * @property int|null $user_id
 * @property int|null $score
 * @property string|null $first_round_data
 * @property string|null $second_round_data
 * @property \Cake\I18n\FrozenTime|null $created
 * @property \Cake\I18n\FrozenTime|null $modified
 *
 * @property \App\Model\Entity\OnlineGame $online_game
 * @property \App\Model\Entity\User $user
 */
class OnlineGameHistory extends Entity
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
        'online_game_id' => true,
        'user_id' => true,
        'score' => true,
        'first_round_data' => true,
        'second_round_data' => true,
        'created' => true,
        'modified' => true,
        'online_game' => true,
        'user' => true,
    ];
}
