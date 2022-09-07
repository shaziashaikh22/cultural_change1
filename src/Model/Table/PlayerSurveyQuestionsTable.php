<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * PlayerSurveyQuestions Model
 *
 * @property \App\Model\Table\PlayerSurveyAnswersTable&\Cake\ORM\Association\HasMany $PlayerSurveyAnswers
 *
 * @method \App\Model\Entity\PlayerSurveyQuestion get($primaryKey, $options = [])
 * @method \App\Model\Entity\PlayerSurveyQuestion newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\PlayerSurveyQuestion[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\PlayerSurveyQuestion|false save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\PlayerSurveyQuestion saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\PlayerSurveyQuestion patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\PlayerSurveyQuestion[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\PlayerSurveyQuestion findOrCreate($search, callable $callback = null, $options = [])
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */
class PlayerSurveyQuestionsTable extends Table
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

        $this->setTable('player_survey_questions');
        $this->setDisplayField('id');
        $this->setPrimaryKey('id');

        $this->addBehavior('Timestamp');

        $this->hasMany('PlayerSurveyAnswers', [
            'foreignKey' => 'player_survey_question_id',
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
            ->scalar('question_txt')
            ->maxLength('question_txt', 100)
            ->allowEmptyString('question_txt');

        $validator
            ->scalar('status')
            ->maxLength('status', 100)
            ->allowEmptyString('status');

        return $validator;
    }
}
