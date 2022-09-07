<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Shapes Model
 *
 * @property \App\Model\Table\ShapeGroupsTable&\Cake\ORM\Association\BelongsTo $ShapeGroups
 *
 * @method \App\Model\Entity\Shape get($primaryKey, $options = [])
 * @method \App\Model\Entity\Shape newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\Shape[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Shape|false save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Shape saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Shape patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Shape[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\Shape findOrCreate($search, callable $callback = null, $options = [])
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */
class ShapesTable extends Table
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

        $this->setTable('shapes');
        $this->setDisplayField('id');
        $this->setPrimaryKey('id');

        $this->addBehavior('Timestamp');

        $this->belongsTo('ShapeGroups', [
            'foreignKey' => 'shape_group_id',
        ]);
        $this->belongsTo('UserTypes', [
            'foreignKey' => 'user_type_id',
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
            ->scalar('shape_name')
            ->maxLength('shape_name', 100)
            ->allowEmptyString('shape_name');

        $validator
            ->scalar('shape_image')
            ->maxLength('shape_image', 10000)
            ->allowEmptyFile('shape_image');

            $validator
            ->scalar('width')
            ->maxLength('width', 100)
            ->allowEmptyFile('width');

            $validator
            ->scalar('height')
            ->maxLength('height', 100)
            ->allowEmptyFile('height');

            $validator
            ->integer('user_type_id')
            ->allowEmptyString('user_type_id');

            $validator
            ->integer('score')
            ->allowEmptyString('score');

            $validator
            ->integer('cutout_limit_r1')
            ->allowEmptyString('cutout_limit_r1');

            $validator
            ->integer('score_round2')
            ->allowEmptyString('score_round2');

            $validator
            ->integer('cutout_limit_r2')
            ->allowEmptyString('cutout_limit_r2');
            
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
        $rules->add($rules->existsIn(['shape_group_id'], 'ShapeGroups'));
        $rules->add($rules->existsIn(['user_type_id'], 'UserTypes'));

        return $rules;
    }
}
