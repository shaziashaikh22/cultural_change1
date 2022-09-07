<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * UserTypes Model
 *
 * @property \App\Model\Table\AccessesTable&\Cake\ORM\Association\BelongsTo $Accesses
 * @property \App\Model\Table\UsersTable&\Cake\ORM\Association\HasMany $Users
 *
 * @method \App\Model\Entity\UserType get($primaryKey, $options = [])
 * @method \App\Model\Entity\UserType newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\UserType[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\UserType|false save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\UserType saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\UserType patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\UserType[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\UserType findOrCreate($search, callable $callback = null, $options = [])
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */
class UserTypesTable extends Table
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

        $this->setTable('user_types');
        $this->setDisplayField('type_name');
        $this->setPrimaryKey('id');

        $this->addBehavior('Timestamp');

        $this->belongsTo('Accesses', [
            'foreignKey' => 'access_id',
        ]);
        $this->hasMany('Users', [
            'foreignKey' => 'user_type_id',
        ]);
        // below changes at 1-24-2022
        $this->hasMany('Shapes', [
            'foreignKey' => 'user_type_id',
        ]); 
        $this->hasMany('ShapeGroups', [
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
            ->scalar('type_name')
            ->maxLength('type_name', 100)
            ->allowEmptyString('type_name');

        $validator
            ->scalar('type_description')
            ->maxLength('type_description', 1000)
            ->allowEmptyString('type_description');

            $validator
            ->scalar('upload_image')
            ->maxLength('upload_image', 1000)
            ->allowEmptyString('upload_image');

            $validator
            ->scalar('user_type_status')
            ->maxLength('user_type_status', 100)
            ->allowEmptyString('user_type_status');

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
        $rules->add($rules->existsIn(['access_id'], 'Accesses'));

        return $rules;
    }
}
