<?php
namespace App\Controller\Component;

use Cake\Controller\Component;

class MathComponent extends Component
{
    public function doComplexOperation($amount1, $amount2)
    {
    	/*$controller = $this->_registry->getController();
    	pr($controller->callMe()); die;
    	pr($controller->article_callMe()); die;*/
        return $amount1 + $amount2;
    }
}