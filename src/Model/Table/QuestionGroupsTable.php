<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * QuestionGroups Model
 *
 * @property \App\Model\Table\QuestionsTable&\Cake\ORM\Association\HasMany $Questions
 * @property \App\Model\Table\SurveysTable&\Cake\ORM\Association\HasMany $Surveys
 *
 * @method \App\Model\Entity\QuestionGroup get($primaryKey, $options = [])
 * @method \App\Model\Entity\QuestionGroup newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\QuestionGroup[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\QuestionGroup|false save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\QuestionGroup saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\QuestionGroup patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\QuestionGroup[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\QuestionGroup findOrCreate($search, callable $callback = null, $options = [])
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */
class QuestionGroupsTable extends Table
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

        $this->setTable('question_groups');
        $this->setDisplayField('id');
        $this->setPrimaryKey('id');

        $this->addBehavior('Timestamp');

        $this->hasMany('Questions', [
            'foreignKey' => 'question_group_id',
        ]);
        $this->hasMany('Surveys', [
            'foreignKey' => 'question_group_id',
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
            ->scalar('question_group_name')
            ->maxLength('question_group_name', 100)
            ->allowEmptyString('question_group_name');

        $validator
            ->scalar('question_group_description')
            ->maxLength('question_group_description', 10000)
            ->allowEmptyString('question_group_description');

        $validator
            ->scalar('question_status')
            ->maxLength('question_status', 100)
            ->allowEmptyString('question_status');

        return $validator;
    }
}
