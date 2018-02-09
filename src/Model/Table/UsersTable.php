<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Users Model
 *
 * @property \App\Model\Table\RealestatesTable|\Cake\ORM\Association\HasMany $Realestates
 * @property \App\Model\Table\PhonesTable|\Cake\ORM\Association\BelongsToMany $Phones
 * @property \App\Model\Table\RolesTable|\Cake\ORM\Association\BelongsToMany $Roles
 *
 * @method \App\Model\Entity\User get($primaryKey, $options = [])
 * @method \App\Model\Entity\User newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\User[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\User|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\User patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\User[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\User findOrCreate($search, callable $callback = null, $options = [])
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */
class UsersTable extends Table
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

        $this->setTable('users');
        $this->setDisplayField('id');
        $this->setPrimaryKey('id');

        $this->addBehavior('Timestamp');

        $this->hasMany('Realestates', [
            'foreignKey' => 'user_id'
        ]);
        $this->belongsToMany('Phones', [
            'foreignKey' => 'user_id',
            'targetForeignKey' => 'phone_id',
            'joinTable' => 'phones_users'
        ]);
        $this->belongsToMany('Roles', [
            'foreignKey' => 'user_id',
            'targetForeignKey' => 'role_id',
            'joinTable' => 'roles_users'
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
            ->scalar('username')
            ->maxLength('username', 20)
            ->requirePresence('username', 'create')
            ->notEmpty('username')
            ->add('username', 'unique', ['rule' => 'validateUnique', 'provider' => 'table']);

        $validator
            ->notEmpty('password', __("You must specify your password."))
            ->notEmpty('password_confirm', __("You must specify your password (confirmation)."))
            ->add('password_confirm', [
                'lengthBetween' => [
                    'rule' => ['lengthBetween', 8, 20],
                    'message' => __("Your password (confirmation) must be between {0} and {1} characters.", 8, 20)
                ],
                'equalToPassword' => [
                    'rule' => function ($value, $context) {
                        return $value === $context['data']['password'];
                    },
                    'message' => __("Your password confirm must match with your password.")
                ]
            ]);

        $validator
            ->email('email')
            ->requirePresence('email', 'create')
            ->notEmpty('email')
            ->add('email', 'unique', ['rule' => 'validateUnique', 'provider' => 'table']);

        $validator
            ->scalar('first_name')
            ->maxLength('first_name', 100)
            ->allowEmpty('first_name');

        $validator
            ->scalar('last_name')
            ->maxLength('last_name', 100)
            ->allowEmpty('last_name');

        $validator
            ->scalar('avatar')
            ->maxLength('avatar', 255)
            ->requirePresence('avatar', 'create')
            ->notEmpty('avatar');

        $validator
            ->scalar('biography')
            ->allowEmpty('biography');

        $validator
            ->scalar('signature')
            ->allowEmpty('signature');

        $validator
            ->scalar('language')
            ->maxLength('language', 7)
            ->requirePresence('language', 'create')
            ->notEmpty('language');

        $validator
            ->dateTime('password_code_expire')
            ->allowEmpty('password_code_expire');

        $validator
            ->integer('password_reset_count')
            ->requirePresence('password_reset_count', 'create')
            ->notEmpty('password_reset_count');

        $validator
            ->scalar('password_code')
            ->maxLength('password_code', 255)
            ->allowEmpty('password_code');

        $validator
            ->dateTime('tos_date')
            ->allowEmpty('tos_date');

        $validator
            ->scalar('token')
            ->maxLength('token', 255)
            ->allowEmpty('token');

        $validator
            ->scalar('register_ip')
            ->maxLength('register_ip', 15)
            ->allowEmpty('register_ip');

        $validator
            ->scalar('last_login_ip')
            ->maxLength('last_login_ip', 15)
            ->allowEmpty('last_login_ip');

        $validator
            ->dateTime('last_login')
            ->requirePresence('last_login', 'create')
            ->notEmpty('last_login');

        $validator
            ->boolean('active')
            ->requirePresence('active', 'create')
            ->notEmpty('active');

        $validator
            ->scalar('created_by')
            ->maxLength('created_by', 255)
            ->allowEmpty('created_by');

        $validator
            ->scalar('modified_by')
            ->maxLength('modified_by', 255)
            ->allowEmpty('modified_by');

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
        $rules->add($rules->isUnique(['username']));
        $rules->add($rules->isUnique(['email']));

        return $rules;
    }


    public function findToken(Query $query, array $opt)
    {

        return $query
            ->Where(['active' => 0])
            ->where(['token'=> $opt["token"]]);
    }


    public function findEmail(Query $query, array $opt)
    {
        return $query
            ->where(['email'=> $opt["email"]]);
    }


    public function findPasswordToken(Query $query, array $opt)
    {
        return $query
            ->where(['password_code '=> $opt["token"]]);
    }
}
