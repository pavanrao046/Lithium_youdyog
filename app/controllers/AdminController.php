<?php
namespace app\controllers;

session_start();

use app\models\Users;
use app\controllers\Constants;

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
		$msg = '';
		if($_SESSION['loginSuccess'] != 1)
			return $this->redirect('Login::login');

		if(isset($_SESSION['roles']))
		{
			$isAdmin = false;
			foreach ($_SESSION['roles'] as $role) {
				if($role['value'] == Constants::ROLE_ADMIN) {
					$isAdmin = true;
					break;
				}
			}
			if(!$isAdmin)
				return $this->redirect('User::index');
		}

		$temp = $this->request->data;
		if(isset($_POST) && $temp['email'] != null || $temp['email'] != "")
		{
			// $users = Users::first(array('conditions' => 'user_email'=>$temp['user_email']));
			$users = Users::first(array('conditions' => array('email'=>$temp['email'])));
			if(isset($users) && $users['email']==$temp['email']) {
				unset($_SESSION['tempuserEmail']);
				unset($_SESSION['tempuserId']);
				$msg = 'User with email id '. $temp['email']. ' already exists!';
				return compact('msg');
				//return "Error: User with email id ".$temp['email']." already exists";
			} else {
				$random = substr(number_format(time() * rand(),0,'',''),0,10);
				$temp['uniqueno'] = $random;///substr($temp['user_email'],0,strpos($temp['user_email'],'@'))
				$temp['roles']=array(array('value'=>$temp['roles']));
				$adm = Users::create($temp);
				if($adm->save()) {
					$msg = 'success';
				} else $msg = 'Unable to save user!';
				//return $this->redirect('Admin::manage');
				return compact('msg','random');
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
