<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Results Model
 *
 * @property \App\Model\Table\UsersTable&\Cake\ORM\Association\BelongsTo $Users
 * @property \App\Model\Table\UserTypesTable&\Cake\ORM\Association\BelongsTo $UserTypes
 * @property &\Cake\ORM\Association\BelongsTo $GameSteps
 * @property \App\Model\Table\RoundsTable&\Cake\ORM\Association\BelongsTo $Rounds
 * @property \App\Model\Table\PhasesTable&\Cake\ORM\Association\BelongsTo $Phases
 *
 * @method \App\Model\Entity\Result get($primaryKey, $options = [])
 * @method \App\Model\Entity\Result newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\Result[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Result|false save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Result saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Result patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Result[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\Result findOrCreate($search, callable $callback = null, $options = [])
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */
class ResultsTable extends Table
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

        $this->setTable('results');
        $this->setDisplayField('id');
        $this->setPrimaryKey('id');

        $this->addBehavior('Timestamp');

        $this->belongsTo('Users', [
            'foreignKey' => 'user_id',
        ]);
        $this->belongsTo('UserTypes', [
            'foreignKey' => 'user_type_id',
        ]);
        $this->belongsTo('GameSteps', [
            'foreignKey' => 'game_step_id',
        ]);
        $this->belongsTo('Rounds', [
            'foreignKey' => 'round_id',
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
            ->scalar('game_code')
            ->maxLength('game_code', 100)
            ->allowEmptyString('game_code');

        $validator
            ->integer('score')
            ->allowEmptyString('score');

        $validator
            ->scalar('given_time')
            ->maxLength('given_time', 100)
            ->allowEmptyString('given_time');

        $validator
            ->scalar('start_time')
            ->maxLength('start_time', 100)
            ->allowEmptyString('start_time');

        $validator
            ->scalar('end_time')
            ->maxLength('end_time', 100)
            ->allowEmptyString('end_time');

        $validator
            ->scalar('canvas_image')
            ->maxLength('canvas_image', 4294967295)
            ->allowEmptyFile('canvas_image');

        $validator
            ->date('date')
            ->allowEmptyDate('date');

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
        $rules->add($rules->existsIn(['user_id'], 'Users'));
        $rules->add($rules->existsIn(['user_type_id'], 'UserTypes'));
        $rules->add($rules->existsIn(['game_step_id'], 'GameSteps'));
        $rules->add($rules->existsIn(['round_id'], 'Rounds'));
        $rules->add($rules->existsIn(['phase_id'], 'Phases'));

        return $rules;
    }
}
