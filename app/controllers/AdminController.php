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
		if($_SESSION['loginSuccess'] != 1)
			return $this->redirect('Login::login');
	}

	public function manage()
	{
		if($_SESSION['loginSuccess'] != 1)
			return $this->redirect('Login::login');
	
		if(isset($_SESSION['role']) && $_SESSION['role'] != 'admin' )
		{
			return $this->redirect('User::index');
		} 
		else 
		{
			$temp = $this->request->data;
			if($temp) 
			{
			  // var_dump($temp);
			  // $users = Users::first(array('conditions' => 'user_email'=>$temp['user_email']));
			  $users = Users::first(array('conditions' => array('email'=>$temp['email'])));
				if(isset($users) && $users['email']==$temp['email']) {
					return "Error: User with email id ".$temp['email']." already exists";
				} else {
					$random = substr(number_format(time() * rand(),0,'',''),0,10);
					$temp['uniqueno'] = $random;///substr($temp['user_email'],0,strpos($temp['user_email'],'@'))
					$temp['roles']=array(array('value'=>$temp['roles']));
					$adm = Users::create($temp);
					if($adm->save())
						return $this->redirect('Admin::manage');
					else return "Error: Unable to save user";
				}
			}
		}
	}

	public function success()
	{
		if($_SESSION['loginSuccess'] != 1)
			return $this->redirect('Login::login');
				
	}
}


?>
