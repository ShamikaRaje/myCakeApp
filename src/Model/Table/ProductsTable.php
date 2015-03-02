<?php
namespace App\Model\Table;

use App\Model\Entity\Product;
use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;


/**
 * Products Model
 */
class ProductsTable extends Table
{

    /**
     * Initialize method
     *
     * @param array $config The configuration for the Table.
     * @return void
     */
    public function initialize(array $config)
    {
        $this->table('products');
        $this->addBehavior('SoftDeletable');
        $this->displayField('Product_name');
        $this->primaryKey('id');
    }

    //custom finder method
    public function findCustomFetch(Query $query, array $options){
        $query //->where(['Products.Prod_brand LIKE' => '%Samsung%', 'Products.id >' => 3])
                ->all()
                ->toArray();
        return $query;
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
            ->requirePresence('Product_name', 'create')
            ->notEmpty('Product_name')
            ->add('Prod_price', 'valid', ['rule' => 'numeric'])
            ->requirePresence('Prod_price', 'create')
            ->notEmpty('Prod_price')
            ->requirePresence('Prod_brand', 'create')
            ->notEmpty('Prod_brand')
            ->add('Created', 'valid', ['rule' => 'date'])
            ->requirePresence('Created', 'create')
            ->notEmpty('Created');

        return $validator;
    }

    // In a table or behavior class
    public function beforeMarshal(Event $event, ArrayObject $data, ArrayObject $options)
    {
        echo "here in beforeMarshal";
        //$data['username'] .= 'user';
        pr($data); die;
    }

    /*public function printData(){
        echo "hello";
    }*/
}
