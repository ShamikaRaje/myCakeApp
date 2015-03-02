<?php
namespace App\Model\Table;

use App\Model\Entity\ProductsMix;
use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;


/**
 * ProductsMixes Model
 */
class ProductsMixesTable extends Table
{

    /**
     * Initialize method
     *
     * @param array $config The configuration for the Table.
     * @return void
     */
    public function initialize(array $config)
    {
        $this->table('products_mixes');
        $this->displayField('id');
        $this->primaryKey('id');
        $this->belongsTo('products', [
            'foreignKey' => 'prod_id'
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
            ->add('id', 'valid', ['rule' => 'numeric'])
            ->allowEmpty('id', 'create')
            ->add('prod_id', 'valid', ['rule' => 'numeric'])
            ->requirePresence('prod_id', 'create')
            ->notEmpty('prod_id')
            ->requirePresence('prod_mix_name', 'create')
            ->notEmpty('prod_mix_name')
            ->add('prod_mix_price', 'valid', ['rule' => 'numeric'])
            ->requirePresence('prod_mix_price', 'create')
            ->notEmpty('prod_mix_price')
            ->add('Created', 'valid', ['rule' => 'date'])
            ->requirePresence('Created', 'create')
            ->notEmpty('Created');

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
        $rules->add($rules->existsIn(['prod_id'], 'products'));
        return $rules;
    }
    
}
