<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * OnlineGames Model
 *
 * @property \App\Model\Table\SurveysTable&\Cake\ORM\Association\BelongsTo $Surveys
 * @property \App\Model\Table\ShapeGroupsTable&\Cake\ORM\Association\BelongsTo $ShapeGroups
 * @property \App\Model\Table\LoginForMatchesTable&\Cake\ORM\Association\HasMany $LoginForMatches
 * @property \App\Model\Table\OnlineGameHistoriesTable&\Cake\ORM\Association\HasMany $OnlineGameHistories
 *
 * @method \App\Model\Entity\OnlineGame get($primaryKey, $options = [])
 * @method \App\Model\Entity\OnlineGame newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\OnlineGame[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\OnlineGame|false save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\OnlineGame saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\OnlineGame patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\OnlineGame[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\OnlineGame findOrCreate($search, callable $callback = null, $options = [])
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */
class OnlineGamesTable extends Table
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

        $this->setTable('online_games');
        $this->setDisplayField('id');
        $this->setPrimaryKey('id');

        $this->addBehavior('Timestamp');

        $this->belongsTo('Surveys', [
            'foreignKey' => 'survey_id',
        ]);
        $this->belongsTo('ShapeGroups', [
            'foreignKey' => 'shape_group_id',
        ]);
        $this->hasMany('LoginForMatches', [
            'foreignKey' => 'online_game_id',
        ]);
        $this->hasMany('OnlineGameHistories', [
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
            ->scalar('game_name')
            ->maxLength('game_name', 100)
            ->allowEmptyString('game_name');

        $validator
            ->scalar('game_players_allowed')
            ->maxLength('game_players_allowed', 100)
            ->allowEmptyString('game_players_allowed');

        $validator
            ->integer('players_turn')
            ->allowEmptyString('players_turn');

        $validator
            ->scalar('status')
            ->maxLength('status', 100)
            ->allowEmptyString('status');

        $validator
            ->scalar('start_time')
            ->maxLength('start_time', 100)
            ->allowEmptyString('start_time');

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
        $rules->add($rules->existsIn(['survey_id'], 'Surveys'));
        $rules->add($rules->existsIn(['shape_group_id'], 'ShapeGroups'));

        return $rules;
    }
}
