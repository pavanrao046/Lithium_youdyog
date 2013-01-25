<?php
namespace app\controllers;

session_start();

use app\models\Users;

use lithium\security\Auth;
use lithium\g11n\Message;
use lithium\storage\Session;

class AdminController extends \lithium\action\Controller 
{
		public function index()
		{
		
		}

		public function manage()
		{
			if(isset($_SESSION['role']) && $_SESSION['role'] != 'admin' )
				return $this->redirect('User::index');
			$adm = Users::create($this->request->data);
				if(($this->request->data) && $adm->save()) 
				{	
						
									
						return $this->redirect('Admin::success');	 

				}

				return compact('adm');					
			
		}
				
		public function success()
		{

		}


		
}


?>
