<?php 
namespace app\models;
use \lithium\data\connections;

class Whichs extends \lithium\data\Model {

	protected function _init() {
        	$this->_render['negotiate'] = true;
        	parent::_init();
   }	
	
	/* for retrieval from whichs collection */
	public function getWhichs($type,$options){					
		$whichs = Whichs::find($type);
		return $whichs;
	}
	
	
	/* for updating whichs collection */
	public function updateWhich($query, $condition){
		$result = Whichs::update($query,$condition, array('atomic' => false));		
		return $result;	
	}

}
 
 
?>
