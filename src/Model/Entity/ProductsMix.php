<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * ProductsMix Entity.
 */
class ProductsMix extends Entity
{

    /**
     * Fields that can be mass assigned using newEntity() or patchEntity().
     *
     * @var array
     */
    protected $_accessible = [
        'prod_id' => true,
        'prod_mix_name' => true,
        'prod_mix_price' => true,
        'Created' => true,
        //'prod' => true,
    ];
}
