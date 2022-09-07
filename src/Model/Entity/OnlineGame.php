<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * OnlineGame Entity
 *
 * @property int $id
 * @property string|null $game_name
 * @property string|null $game_players_allowed
 * @property int|null $players_turn
 * @property int|null $survey_id
 * @property int|null $shape_group_id
 * @property string|null $status
 * @property string|null $start_time
 * @property \Cake\I18n\FrozenTime|null $created
 * @property \Cake\I18n\FrozenTime|null $modified
 *
 * @property \App\Model\Entity\UserType $user_type
 * @property \App\Model\Entity\Survey $survey
 * @property \App\Model\Entity\ShapeGroup $shape_group
 * @property \App\Model\Entity\LoginForMatch[] $login_for_matches
 * @property \App\Model\Entity\OnlineGameHistory[] $online_game_histories
 */
class OnlineGame extends Entity
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
        'game_name' => true,
        'game_players_allowed' => true,
        'players_turn' => true,
        'survey_id' => true,
        'shape_group_id' => true,
        'status' => true,
        'start_time' => true,
        'created' => true,
        'modified' => true,
        // 'user_type' => true,
        'survey' => true,
        'shape_group' => true,
        'login_for_matches' => true,
        'online_game_histories' => true,
    ];
}
