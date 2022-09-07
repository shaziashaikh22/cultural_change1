<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * NewSurvey Entity
 *
 * @property int $id
 * @property string|null $survey_title
 * @property string|null $survey_question
 * @property string|null $survey_answer
 * @property string|null $survey_description
 * @property string|null $survey_status
 * @property \Cake\I18n\FrozenDate|null $created
 * @property \Cake\I18n\FrozenDate|null $modified
 */
class NewSurvey extends Entity
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
        'survey_title' => true,
        'survey_question' => true,
        'survey_answer' => true,
        'survey_description' => true,
        'survey_status' => true,
        'created' => true,
        'modified' => true,
    ];
}
