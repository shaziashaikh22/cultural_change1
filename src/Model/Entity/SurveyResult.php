<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * SurveyResult Entity
 *
 * @property int $id
 * @property int|null $user_id
 * @property int|null $user_type_id
 * @property int|null $new_survey_id
 * @property string|null $answer
 * @property \Cake\I18n\FrozenDate|null $created
 * @property \Cake\I18n\FrozenDate|null $modified
 *
 * @property \App\Model\Entity\User $user
 * @property \App\Model\Entity\UserType $user_type
 * @property \App\Model\Entity\NewSurvey $new_survey
 */
class SurveyResult extends Entity
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
        'game_code' => true,
        'user_type_id' => true,
        'new_survey_id' => true,
        'answer' => true,
        'created' => true,
        'modified' => true,
        'user' => true,
        'user_type' => true,
        'new_survey' => true,
    ];
}
