<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * NewSurveys Model
 *
 * @method \App\Model\Entity\NewSurvey get($primaryKey, $options = [])
 * @method \App\Model\Entity\NewSurvey newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\NewSurvey[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\NewSurvey|false save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\NewSurvey saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\NewSurvey patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\NewSurvey[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\NewSurvey findOrCreate($search, callable $callback = null, $options = [])
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */
class NewSurveysTable extends Table
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

        $this->setTable('new_surveys');
        $this->setDisplayField('id');
        $this->setPrimaryKey('id');

        $this->addBehavior('Timestamp');
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
            ->scalar('survey_title')
            ->maxLength('survey_title', 500)
            ->allowEmptyString('survey_title');

        $validator
            ->scalar('survey_question')
            ->maxLength('survey_question', 1000)
            ->allowEmptyString('survey_question');

        $validator
            ->scalar('survey_answer')
            ->maxLength('survey_answer', 1000)
            ->allowEmptyString('survey_answer');

        $validator
            ->scalar('survey_description')
            ->maxLength('survey_description', 10000)
            ->allowEmptyString('survey_description');

        $validator
            ->scalar('survey_status')
            ->maxLength('survey_status', 100)
            ->allowEmptyString('survey_status');

        return $validator;
    }
}
