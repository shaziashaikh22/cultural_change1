<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * PlayerSurveyAnswer Entity
 *
 * @property int $id
 * @property int|null $player_survey_question_id
 * @property int|null $user_type_id
 * @property int|null $user_id
 * @property string|null $answer_txt
 * @property int|null $online_game_id
 * @property string|null $status
 * @property \Cake\I18n\FrozenDate|null $created
 * @property \Cake\I18n\FrozenDate|null $modified
 *
 * @property \App\Model\Entity\PlayerSurveyQuestion $player_survey_question
 * @property \App\Model\Entity\UserType $user_type
 * @property \App\Model\Entity\User $user
 * @property \App\Model\Entity\OnlineGame $online_game
 */
class PlayerSurveyAnswer extends Entity
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
        'player_survey_question_id' => true,
        'user_type_id' => true,
        'user_id' => true,
        'game_name' => true,
        'answer_txt' => true,
        'online_game_id' => true,
        'status' => true,
        'created' => true,
        'modified' => true,
        'player_survey_question' => true,
        'user_type' => true,
        'user' => true,
        'online_game' => true,
    ];
}
