<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * PhonesRealestates Model
 *
 * @property \App\Model\Table\PhonesTable|\Cake\ORM\Association\BelongsTo $Phones
 * @property \App\Model\Table\RealestatesTable|\Cake\ORM\Association\BelongsTo $Realestates
 *
 * @method \App\Model\Entity\PhonesRealestate get($primaryKey, $options = [])
 * @method \App\Model\Entity\PhonesRealestate newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\PhonesRealestate[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\PhonesRealestate|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\PhonesRealestate patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\PhonesRealestate[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\PhonesRealestate findOrCreate($search, callable $callback = null, $options = [])
 */
class PhonesRealestatesTable extends Table
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

        $this->setTable('phones_realestates');
        $this->setDisplayField('id');
        $this->setPrimaryKey('id');

        $this->belongsTo('Phones', [
            'foreignKey' => 'phone_id',
            'joinType' => 'INNER'
        ]);
        $this->belongsTo('Realestates', [
            'foreignKey' => 'realestate_id',
            'joinType' => 'INNER'
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
        $rules->add($rules->existsIn(['phone_id'], 'Phones'));
        $rules->add($rules->existsIn(['realestate_id'], 'Realestates'));

        return $rules;
    }
}
