<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Phases Model
 *
 * @property \App\Model\Table\JobDescriptionsTable&\Cake\ORM\Association\HasMany $JobDescriptions
 *
 * @method \App\Model\Entity\Phase get($primaryKey, $options = [])
 * @method \App\Model\Entity\Phase newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\Phase[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Phase|false save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Phase saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Phase patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Phase[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\Phase findOrCreate($search, callable $callback = null, $options = [])
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */
class PhasesTable extends Table
{
    /**
     * Initialize method
     *
     * @param array $config The configuration for the Table.
     * @return void
     */
    public function initialize(array $config)
    {
        parent::initialize($config);

        $this->setTable('phases');
        $this->setDisplayField('id');
        $this->setPrimaryKey('id');

        $this->addBehavior('Timestamp');

        $this->hasMany('JobDescriptions', [
            'foreignKey' => 'phase_id',
        ]);
    }

    /**
     * Default validation rules.
     *
     * @param \Cake\Validation\Validator $validator Validator instance.
     * @return \Cake\Validation\Validator
     */
    public function validationDefault(Validator $validator)
    {
        $validator
            ->integer('id')
            ->allowEmptyString('id', null, 'create');

        $validator
            ->scalar('phase_name')
            ->maxLength('phase_name', 100)
            ->allowEmptyString('phase_name');

        $validator
            ->scalar('status')
            ->maxLength('status', 100)
            ->allowEmptyString('status');

        return $validator;
    }
}
