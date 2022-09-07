<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * JobDescriptions Model
 *
 * @property \App\Model\Table\RoundsTable&\Cake\ORM\Association\BelongsTo $Rounds
 * @property \App\Model\Table\UserTypesTable&\Cake\ORM\Association\BelongsTo $UserTypes
 * @property \App\Model\Table\PhasesTable&\Cake\ORM\Association\BelongsTo $Phases
 *
 * @method \App\Model\Entity\JobDescription get($primaryKey, $options = [])
 * @method \App\Model\Entity\JobDescription newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\JobDescription[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\JobDescription|false save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\JobDescription saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\JobDescription patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\JobDescription[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\JobDescription findOrCreate($search, callable $callback = null, $options = [])
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */
class JobDescriptionsTable extends Table
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

        $this->setTable('job_descriptions');
        $this->setDisplayField('id');
        $this->setPrimaryKey('id');

        $this->addBehavior('Timestamp');

        $this->belongsTo('Rounds', [
            'foreignKey' => 'round_id',
        ]);
        $this->belongsTo('UserTypes', [
            'foreignKey' => 'user_type_id',
        ]);
        $this->belongsTo('Phases', [
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
            ->scalar('description')
            ->allowEmptyString('description');

        $validator
            ->scalar('project_info')
            ->allowEmptyString('project_info');

        $validator
            ->scalar('status')
            ->maxLength('status', 100)
            ->allowEmptyString('status');

        return $validator;
    }

    /**
     * Returns a rules checker object that will be used for validating
     * application integrity.
     *
     * @param \Cake\ORM\RulesChecker $rules The rules object to be modified.
     * @return \Cake\ORM\RulesChecker
     */
    public function buildRules(RulesChecker $rules)
    {
        $rules->add($rules->existsIn(['round_id'], 'Rounds'));
        $rules->add($rules->existsIn(['user_type_id'], 'UserTypes'));
        $rules->add($rules->existsIn(['phase_id'], 'Phases'));

        return $rules;
    }
}
