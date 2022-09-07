<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * OnlineGameHistories Model
 *
 * @property \App\Model\Table\OnlineGamesTable&\Cake\ORM\Association\BelongsTo $OnlineGames
 * @property \App\Model\Table\UsersTable&\Cake\ORM\Association\BelongsTo $Users
 *
 * @method \App\Model\Entity\OnlineGameHistory get($primaryKey, $options = [])
 * @method \App\Model\Entity\OnlineGameHistory newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\OnlineGameHistory[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\OnlineGameHistory|false save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\OnlineGameHistory saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\OnlineGameHistory patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\OnlineGameHistory[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\OnlineGameHistory findOrCreate($search, callable $callback = null, $options = [])
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */
class OnlineGameHistoriesTable extends Table
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

        $this->setTable('online_game_histories');
        $this->setDisplayField('id');
        $this->setPrimaryKey('id');

        $this->addBehavior('Timestamp');

        $this->belongsTo('OnlineGames', [
            'foreignKey' => 'online_game_id',
        ]);
        $this->belongsTo('Users', [
            'foreignKey' => 'user_id',
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
            ->integer('score')
            ->allowEmptyString('score');

        $validator
            ->scalar('first_round_data')
            ->maxLength('first_round_data', 1000)
            ->allowEmptyString('first_round_data');

        $validator
            ->scalar('second_round_data')
            ->maxLength('second_round_data', 1000)
            ->allowEmptyString('second_round_data');

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
        $rules->add($rules->existsIn(['online_game_id'], 'OnlineGames'));
        $rules->add($rules->existsIn(['user_id'], 'Users'));

        return $rules;
    }
}
