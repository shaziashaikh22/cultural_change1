<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * LoginForMatches Model
 *
 * @property \App\Model\Table\UsersTable&\Cake\ORM\Association\BelongsTo $Users
 * @property \App\Model\Table\OnlineGamesTable&\Cake\ORM\Association\BelongsTo $OnlineGames
 *
 * @method \App\Model\Entity\LoginForMatch get($primaryKey, $options = [])
 * @method \App\Model\Entity\LoginForMatch newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\LoginForMatch[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\LoginForMatch|false save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\LoginForMatch saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\LoginForMatch patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\LoginForMatch[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\LoginForMatch findOrCreate($search, callable $callback = null, $options = [])
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */
class LoginForMatchesTable extends Table
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

        $this->setTable('login_for_matches');
        $this->setDisplayField('id');
        $this->setPrimaryKey('id');

        $this->addBehavior('Timestamp');

        $this->belongsTo('Users', [
            'foreignKey' => 'user_id',
        ]);
        $this->belongsTo('OnlineGames', [
            'foreignKey' => 'online_game_id',
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
            ->scalar('gamecode')
            ->maxLength('gamecode', 100)
            ->allowEmptyString('gamecode');

        $validator
            ->integer('round_number')
            ->allowEmptyString('round_number');

            $validator
            ->integer('round_id')
            ->allowEmptyString('round_id');

            $validator
            ->integer('phase_id')
            ->allowEmptyString('phase_id');
            
        $validator
            ->scalar('status')
            ->maxLength('status', 100)
            ->allowEmptyString('status');

            $validator
            ->scalar('game_status')
            ->maxLength('game_status', 100)
            ->allowEmptyString('game_status');

            $validator
            ->scalar('start_time')
            ->maxLength('start_time', 100)
            ->allowEmptyString('start_time');

            $validator
            ->integer('waiting_screen')
            ->allowEmptyString('waiting_screen');
            
            
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
        $rules->add($rules->existsIn(['online_game_id'], 'OnlineGames'));

        return $rules;
    }
}
