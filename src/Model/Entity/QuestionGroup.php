<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * QuestionGroup Entity
 *
 * @property int $id
 * @property string|null $question_group_name
 * @property string|null $question_group_description
 * @property string|null $question_status
 * @property \Cake\I18n\FrozenTime|null $created
 * @property \Cake\I18n\FrozenTime|null $modified
 *
 * @property \App\Model\Entity\Question[] $questions
 * @property \App\Model\Entity\Survey[] $surveys
 */
class QuestionGroup extends Entity
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
        'question_group_name' => true,
        'question_group_description' => true,
        'question_status' => true,
        'created' => true,
        'modified' => true,
        'questions' => true,
        'surveys' => true,
    ];
}
