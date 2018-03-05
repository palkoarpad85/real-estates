<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Conditionofproperties Model
 *
 * @method \App\Model\Entity\Conditionofproperty get($primaryKey, $options = [])
 * @method \App\Model\Entity\Conditionofproperty newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\Conditionofproperty[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Conditionofproperty|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Conditionofproperty patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Conditionofproperty[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\Conditionofproperty findOrCreate($search, callable $callback = null, $options = [])
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */
class ConditionofpropertiesTable extends Table
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

        $this->setTable('conditionofproperties');
        $this->setDisplayField('name');
        $this->setPrimaryKey('id');
        $this->addBehavior('Translate', [
            'fields' => ['name'],
            'translationTable' => 'conditionofproperties_i18n'
        ]);
        
        $this->belongsTo('Users', [
            'foreignKey' => 'created_by',
            'joinType' => 'INNER'
        ]);
       
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
            ->allowEmpty('id', 'create');

        $validator
            ->boolean('active')
            ->requirePresence('active', 'create')
            ->notEmpty('active');

        $validator
            ->scalar('name')
            ->maxLength('name', 255)
            ->requirePresence('name', 'create')
            ->notEmpty('name');

        
           

        $validator
            ->integer('modified_by')
            ->requirePresence('modified_by', 'create')
            ->notEmpty('modified_by');

        return $validator;
    }
}
