<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Phase Entity
 *
 * @property int $id
 * @property string|null $phase_name
 * @property string|null $status
 * @property \Cake\I18n\FrozenDate|null $created
 * @property \Cake\I18n\FrozenDate|null $modified
 *
 * @property \App\Model\Entity\JobDescription[] $job_descriptions
 */
class Phase extends Entity
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
        'phase_name' => true,
        'status' => true,
        'created' => true,
        'modified' => true,
        'job_descriptions' => true,
    ];
}
