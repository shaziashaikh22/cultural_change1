<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * GameStep Entity
 *
 * @property int $id
 * @property string|null $step_name
 * @property string|null $status
 * @property \Cake\I18n\FrozenTime|null $created
 * @property \Cake\I18n\FrozenTime|null $modified
 *
 * @property \App\Model\Entity\Result[] $results
 */
class GameStep extends Entity
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
        'step_name' => true,
        'status' => true,
        'created' => true,
        'modified' => true,
        'results' => true,
    ];
}
