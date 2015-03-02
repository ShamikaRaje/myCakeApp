<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;


/**
 * Product Entity.
 */
class Product extends Entity
{

    /**
     * Fields that can be mass assigned using newEntity() or patchEntity().
     *
     * @var array
     */
    protected $_accessible = [
        'Product_name' => true,
        'Prod_price' => true,
        'Prod_brand' => true,
        'Created' => true,
    ];

    

   
}
