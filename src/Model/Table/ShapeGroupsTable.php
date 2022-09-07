<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * ShapeGroups Model
 *
 * @property \App\Model\Table\OnlineGamesTable&\Cake\ORM\Association\HasMany $OnlineGames
 * @property \App\Model\Table\ShapesTable&\Cake\ORM\Association\HasMany $Shapes
 *
 * @method \App\Model\Entity\ShapeGroup get($primaryKey, $options = [])
 * @method \App\Model\Entity\ShapeGroup newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\ShapeGroup[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\ShapeGroup|false save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\ShapeGroup saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\ShapeGroup patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\ShapeGroup[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\ShapeGroup findOrCreate($search, callable $callback = null, $options = [])
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */
class ShapeGroupsTable extends Table
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

        $this->setTable('shape_groups');
        $this->setDisplayField('id');
        $this->setPrimaryKey('id');

        $this->addBehavior('Timestamp');

        $this->hasMany('OnlineGames', [
            'foreignKey' => 'shape_group_id',
        ]);
        $this->hasMany('Shapes', [
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
            ->scalar('shape_group_name')
            ->maxLength('shape_group_name', 100)
            ->allowEmptyString('shape_group_name');

        $validator
            ->scalar('shape_group_description')
            ->maxLength('shape_group_description', 10000)
            ->allowEmptyString('shape_group_description');

        return $validator;
    }
    
    public function buildRules(RulesChecker $rules)
    {
        $rules->add($rules->existsIn(['user_type_id'], 'UserTypes'));

        return $rules;
    }
}
