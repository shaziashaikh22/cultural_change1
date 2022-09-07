<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * PlayerSurveyAnswers Model
 *
 * @property \App\Model\Table\PlayerSurveyQuestionsTable&\Cake\ORM\Association\BelongsTo $PlayerSurveyQuestions
 * @property \App\Model\Table\UserTypesTable&\Cake\ORM\Association\BelongsTo $UserTypes
 * @property \App\Model\Table\UsersTable&\Cake\ORM\Association\BelongsTo $Users
 * @property \App\Model\Table\OnlineGamesTable&\Cake\ORM\Association\BelongsTo $OnlineGames
 *
 * @method \App\Model\Entity\PlayerSurveyAnswer get($primaryKey, $options = [])
 * @method \App\Model\Entity\PlayerSurveyAnswer newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\PlayerSurveyAnswer[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\PlayerSurveyAnswer|false save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\PlayerSurveyAnswer saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\PlayerSurveyAnswer patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\PlayerSurveyAnswer[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\PlayerSurveyAnswer findOrCreate($search, callable $callback = null, $options = [])
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */
class PlayerSurveyAnswersTable extends Table
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

        $this->setTable('player_survey_answers');
        $this->setDisplayField('id');
        $this->setPrimaryKey('id');

        $this->addBehavior('Timestamp');

        $this->belongsTo('PlayerSurveyQuestions', [
            'foreignKey' => 'player_survey_question_id',
        ]);
        $this->belongsTo('UserTypes', [
            'foreignKey' => 'user_type_id',
        ]);
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
            ->scalar('answer_txt')
            ->maxLength('answer_txt', 1000)
            ->allowEmptyString('answer_txt');

        $validator
            ->scalar('status')
            ->maxLength('status', 100)
            ->allowEmptyString('status');

            $validator
            ->scalar('game_name')
            ->maxLength('game_name', 100)
            ->allowEmptyString('game_name');
            

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
        $rules->add($rules->existsIn(['player_survey_question_id'], 'PlayerSurveyQuestions'));
        $rules->add($rules->existsIn(['user_type_id'], 'UserTypes'));
        $rules->add($rules->existsIn(['user_id'], 'Users'));
        $rules->add($rules->existsIn(['online_game_id'], 'OnlineGames'));

        return $rules;
    }
}
