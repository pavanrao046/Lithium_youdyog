<?php 
namespace app\models;
use \lithium\data\connections;

class Users extends \lithium\data\Model {

	protected function _init() {
        	$this->_render['negotiate'] = true;
        	parent::_init();
   }	
	
	/* for retrieval from users collection */
	public function getUsers($type,$options){					
		$users = Users::find($type,$options);
		return $users;
	}
	
	/* for connecting to a user */
	public function connect($query, $condition){			
		$result = Users::update($query,$condition, array('atomic' => false));		
		return $result;		
	}
	
	/* for adding the user to a group */
	public function updateUser($query, $condition){
		$result = Users::update($query,$condition, array('atomic' => false));		
		return $result;	
	}

}
 
 
?>
