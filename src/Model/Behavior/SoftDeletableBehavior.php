<?php
namespace App\Model\Behavior;

use Cake\ORM\Behavior;

class SoftDeletableBehavior extends Behavior{
	    
	     public function initialize(array $config)
	    {
	        if (isset($config['events'])) {
	            $this->config('events', $config['events'], false);
	        }
	    }

	    // override the delete function (behavior methods that override model methods take precedence)
	    function delete(&$Model, $id = null) {
	        $Model->id = $id;

	        // save the deleted field with current date-time
	        if ($Model->saveField('deleted', date('Y-m-d H:i:s'))) {
	            return true;
	        }

	        return false;
	    }

	    function beforeFind(&$Model, $query) {
	         // only include records that have null deleted columns
	         $query['conditions']["{$Model->alias}.deleted <>"] = '';
	         return $query;
	    }
	}