<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * LoginForMatch Entity
 *
 * @property int $id
 * @property int|null $user_id
 * @property int|null $online_game_id
 * @property string|null $gamecode
 * @property int|null $round_number
 * @property string|null $status
 * @property \Cake\I18n\FrozenDate|null $created
 * @property \Cake\I18n\FrozenDate|null $modified
 *
 * @property \App\Model\Entity\User $user
 * @property \App\Model\Entity\OnlineGame $online_game
 */
class LoginForMatch extends Entity
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
        'online_game_id' => true,
        'gamecode' => true,
        'round_number' => true,
        'status' => true,
        'game_status' => true,
        'created' => true,
        'modified' => true,
        'user' => true,
        'online_game' => true,
        'phase_id' => true,
        'round_id' =>true,
        'start_time' => true,
    ];
}
