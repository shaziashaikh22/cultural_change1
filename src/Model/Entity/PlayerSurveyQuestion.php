<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * PlayerSurveyQuestion Entity
 *
 * @property int $id
 * @property string|null $question_txt
 * @property string|null $status
 * @property \Cake\I18n\FrozenDate|null $created
 * @property \Cake\I18n\FrozenDate|null $modified
 *
 * @property \App\Model\Entity\PlayerSurveyAnswer[] $player_survey_answers
 */
class PlayerSurveyQuestion extends Entity
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
        'question_txt' => true,
        'status' => true,
        'created' => true,
        'modified' => true,
        'player_survey_answers' => true,
    ];
}
