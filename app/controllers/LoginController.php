<?php

namespace app\controllers;
session_start();

use app\controllers\Constants;

use app\models\Users;
use lithium\security\Auth;
use lithium\stoarge\Session;

class LoginController extends \lithium\action\Controller
{

	public function login()
	{
		$data = $this->request->data;

		if ($data && $data['email'] != "" && $data['password'] != "")
		{
			if(isset($_POST["recaptcha_challenge_field"])) {
				$privatekey = "6Lcb8tsSAAAAAJcxKb5f0AzH2fvKx1zjnlFHPqon";
				$resp = recaptcha_check_answer ($privatekey,
						$_SERVER["REMOTE_ADDR"],
						$_POST["recaptcha_challenge_field"],
						$_POST["recaptcha_response_field"]);
				if(!$resp->is_valid) {
					$_SESSION['loginFailed'] = 1;
					return;
				}
			}
			if(Auth::check('loginauth', $this->request))
			{
				$_SESSION['loginFailed'] = 0;
				$_SESSION['loginSuccess'] = 1;
				$_SESSION['email'] = $data['email'];
				$myId = Users::getUsers('all',array('conditions' => array('email' => $data['email']), 'fields' => array('_id','roles')));
				$loggedId = $myId[0]['_id'];
				$_SESSION['loggedInUserId'] = $loggedId;
				$_SESSION['roles'] = $myId[0]['roles'];
				foreach ($_SESSION['roles'] as $role) {
					if($role['value']==Constants::ROLE_ADMIN) {
						return $this->redirect('Admin::manage');
					}
				}
				return $this->redirect('User::index');
			}
			else
			{
				$_SESSION['loginFailed'] = 1;
			}
		}
	}

	public function delete()
	{
		Auth::clear('loginauth');
		unset($_SESSION['loginSuccess']);
		unset($_SESSION['loginFailed']);
		unset($_SESSION['count']);
		unset($_SESSION['roles']);
		session_destroy();
		return $this->redirect('/login');
	}

}

?>
