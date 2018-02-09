<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Realestates Model
 *
 * @property \App\Model\Table\UsersTable|\Cake\ORM\Association\BelongsTo $Users
 * @property \App\Model\Table\TypesTable|\Cake\ORM\Association\BelongsTo $Types
 * @property \App\Model\Table\CategoriesTable|\Cake\ORM\Association\BelongsTo $Categories
 * @property \App\Model\Table\ConveniencegradesTable|\Cake\ORM\Association\BelongsTo $ConvenienceGrades
 * @property \App\Model\Table\HeatingtypesTable|\Cake\ORM\Association\BelongsTo $HeatingTypes
 * @property \App\Model\Table\ConditionofpropertiesTable|\Cake\ORM\Association\BelongsTo $ConditionOfProperties
 * @property \App\Model\Table\ParkingsTable|\Cake\ORM\Association\BelongsTo $Parkings
 * @property \App\Model\Table\ImagesTable|\Cake\ORM\Association\HasMany $Images
 * @property \App\Model\Table\PhonesTable|\Cake\ORM\Association\BelongsToMany $Phones
 *
 * @method \App\Model\Entity\Realestate get($primaryKey, $options = [])
 * @method \App\Model\Entity\Realestate newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\Realestate[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Realestate|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Realestate patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Realestate[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\Realestate findOrCreate($search, callable $callback = null, $options = [])
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */
class RealestatesTable extends Table
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

        $this->setTable('realestates');
        $this->setDisplayField('id');
        $this->setPrimaryKey('id');

        $this->addBehavior('Timestamp');

        $this->belongsTo('Users', [
            'foreignKey' => 'user_id',
            'joinType' => 'INNER'
        ]);
        $this->belongsTo('Types', [
            'foreignKey' => 'type_id'
        ]);
        $this->belongsTo('Categories', [
            'foreignKey' => 'category_id'
        ]);
        $this->belongsTo('ConvenienceGrades', [
            'foreignKey' => 'convenienceGrade_id'
        ]);
        $this->belongsTo('HeatingTypes', [
            'foreignKey' => 'heatingType_id'
        ]);
        $this->belongsTo('ConditionOfProperties', [
            'foreignKey' => 'conditionOfProperty_id'
        ]);
        $this->belongsTo('Parkings', [
            'foreignKey' => 'parking_id'
        ]);
        $this->hasMany('Images', [
            'foreignKey' => 'realestate_id'
        ]);
        $this->belongsToMany('Phones', [
            'foreignKey' => 'realestate_id',
            'targetForeignKey' => 'phone_id',
            'joinTable' => 'phones_realestates'
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
            ->allowEmpty('id', 'create');

        $validator
            ->decimal('price')
            ->requirePresence('price', 'create')
            ->notEmpty('price');

        $validator
            ->integer('rooms_numbers')
            ->allowEmpty('rooms_numbers');

        $validator
            ->integer('half_room_numbers')
            ->allowEmpty('half_room_numbers');

        $validator
            ->integer('floor_number')
            ->allowEmpty('floor_number');

        $validator
            ->integer('floor_number_sum')
            ->allowEmpty('floor_number_sum');

        $validator
            ->integer('floor_area')
            ->allowEmpty('floor_area');

        $validator
            ->integer('land_area')
            ->allowEmpty('land_area');

        $validator
            ->boolean('elevator')
            ->allowEmpty('elevator');

        $validator
            ->boolean('external_storage')
            ->allowEmpty('external_storage');

        $validator
            ->scalar('comment')
            ->requirePresence('comment', 'create')
            ->notEmpty('comment');

        $validator
            ->dateTime('premium')
            ->allowEmpty('premium');

        $validator
            ->integer('visitors')
            ->allowEmpty('visitors');

        $validator
            ->date('built_year')
            ->allowEmpty('built_year');

        $validator
            ->scalar('zipCode')
            ->maxLength('zipCode', 10)
            ->allowEmpty('zipCode');

        $validator
            ->scalar('state')
            ->maxLength('state', 255)
            ->allowEmpty('state');

        $validator
            ->scalar('city')
            ->maxLength('city', 255)
            ->allowEmpty('city');

        $validator
            ->scalar('street')
            ->maxLength('street', 255)
            ->allowEmpty('street');

        $validator
            ->scalar('houseNumber')
            ->maxLength('houseNumber', 255)
            ->allowEmpty('houseNumber');

        $validator
            ->scalar('district')
            ->maxLength('district', 255)
            ->allowEmpty('district');

        $validator
            ->decimal('latitude')
            ->requirePresence('latitude', 'create')
            ->notEmpty('latitude');

        $validator
            ->decimal('longitude')
            ->requirePresence('longitude', 'create')
            ->notEmpty('longitude');

        $validator
            ->boolean('active')
            ->allowEmpty('active');

        $validator
            ->integer('created_by')
            ->requirePresence('created_by', 'create')
            ->notEmpty('created_by');

        $validator
            ->integer('modified_by')
            ->requirePresence('modified_by', 'create')
            ->notEmpty('modified_by');

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
        $rules->add($rules->existsIn(['type_id'], 'Types'));
        $rules->add($rules->existsIn(['category_id'], 'Categories'));
        $rules->add($rules->existsIn(['convenienceGrade_id'], 'ConvenienceGrades'));
        $rules->add($rules->existsIn(['heatingType_id'], 'HeatingTypes'));
        $rules->add($rules->existsIn(['conditionOfProperty_id'], 'ConditionOfProperties'));
        $rules->add($rules->existsIn(['parking_id'], 'Parkings'));

        return $rules;
    }
}
