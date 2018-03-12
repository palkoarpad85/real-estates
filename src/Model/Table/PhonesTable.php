<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Phones Model
 *
 * @property \App\Model\Table\RealestatesTable|\Cake\ORM\Association\BelongsToMany $Realestates
 * @property \App\Model\Table\UsersTable|\Cake\ORM\Association\BelongsToMany $Users
 *
 * @method \App\Model\Entity\Phone get($primaryKey, $options = [])
 * @method \App\Model\Entity\Phone newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\Phone[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Phone|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Phone patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Phone[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\Phone findOrCreate($search, callable $callback = null, $options = [])
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */
class PhonesTable extends Table
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

        $this->setTable('phones');
        $this->setDisplayField('id');
        $this->setPrimaryKey('id');

        $this->addBehavior('Timestamp');

        $this->belongsToMany('Realestates', [
            'foreignKey' => 'phone_id',
            'targetForeignKey' => 'realestate_id',
            'joinTable' => 'phones_realestates'
        ]);
        $this->belongsToMany('Users', [
            'foreignKey' => 'phone_id',
            'targetForeignKey' => 'user_id',
            'joinTable' => 'phones_users'
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
            ->boolean('active')
            ->requirePresence('active', 'create')
            ->notEmpty('active');

        $validator
            ->scalar('phoneNumber')
            ->requirePresence('phoneNumber', 'create')
            ->notEmpty('phoneNumber')
            ->add('phoneNumber',[
                'length' => [
                    'rule' => ['lengthBetween', 10, 14],
                    'message' => __("The phone number may consist of a minimum of 10 and a maximum of 11 digits. And Phone number mask : 36 20 222 3344")
                ]
            ]);

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

    public function findUserPhones(Query $query, array $opt){
        return       
        $query
              ->innerJoinWith('Users', function ($q) use ($opt) {            
                     return $q->WHERE(['Users.id'=> $opt["id"]]);
                              
        })      
        ->WHERE(['Phones.active' => 1]);
        
    }
}
