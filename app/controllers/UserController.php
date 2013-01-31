<?php
namespace app\controllers;
session_start();

use app\models\Users;
use app\models\Hows;
use app\models\Whats;
use app\models\Whichs;
use app\models\Wheres;
use app\models\Groups;

use lithium\security\Auth;

use lithium\g11n\Message;
use lithium\storage\Session;
use lithium\security\Password;

class UserController extends \lithium\action\Controller {

	public function register()
	{
		$isRegistered = 0;
		$msg = '';
		if(isset($this->request->data['email'])) {
			$condition = array('_id'=>new \MongoId($_SESSION['tempuserId']));
			$this->request->data['password'] = Password::hash($this->request->data['password']);
			Users::update($this->request->data,$condition);
			unset($_SESSION['tempuserEmail']);
			unset($_SESSION['tempuserId']);
			$isRegistered = 0;
			return compact('isRegistered');
		}
		else
		{
			$uniqueno = substr($_SERVER['REQUEST_URI'],10);
			if(is_numeric($uniqueno) && 10 != strlen($uniqueno)) {
				$msg = "Invalid Registration link. Please check with administrator.";
				return compact('msg');
			}
				
			$tempuser = Users::first(array('conditions'=> array('uniqueno'=>$uniqueno)));
			$_SESSION['tempuserId'] = $tempuser['_id'];
			$_SESSION['tempuserEmail'] = $tempuser['email'];
				
		}

	}
	public function profile()
	{
		if($_SESSION['loginSuccess'] != 1)
			return $this->redirect('Login::login');
		else
		{
			$interestsArray = array();
			return compact('interestsArray');
		}
	}
	public function updateInterests(){
		//$how = $_POST['how'];
		//$what = $_POST['what'];
		//$which = $_POST['which'];
		//$where = $_POST['where'];
		Users::update(array('$push' => array('interest_details' => $this->request->data)),array('_id' => new \MongoId($_SESSION['loggedInUserId'])));
		$interests = Users::getUsers('all', array('conditions' => array('_id' => new \MongoId($_SESSION['loggedInUserId'])),'fields' => array('interest_details')));
		return compact('interests');
	}

	public function welcome() {
		if($_SESSION['loginSuccess'] != 1)
			return $this->redirect('Login::login');
	}


	public function participate()
	{
		if(isset($_POST) && isset($_POST['part'])) {
			$condition = array('_id'=>new \MongoId($_SESSION['loggedInUserId']));
			if($_POST['part']==Constants::ROLE_MEMBER) {
				$query = array('roles' => array(array('value' => Constants::ROLE_MEMBER)));
				Users::Updateuser($query,$condition);
				echo "member";
			} else {
				if($_POST['participate']==Constants::ROLE_PARTNER) {
					$query = array('roles' => array(array('value' => Constants::ROLE_PARTNER)));
					Users::Updateuser($query,$condition);
					echo "partner";
				} else {
					$query = array('roles' => array(array('value' => Constants::ROLE_PROVIDER)));
					Users::Updateuser($query,$condition);
					echo "provider";
				}
			}
			return $this->redirect('User::profile');
		}
	}


	public function index()
	{
		if($_SESSION['loginSuccess'] != 1)
			return $this->redirect('Login::login');

	}


	public function success()
	{

	}

	public function getLink(){
		$email = $_POST['email'];
		$user = Users::getUsers('all', array('conditions' => array('email' => $email), 'fields' => array('uniqueno')));
		$uniqueno = $user[0]['uniqueno'];
		return json_encode(array('link' => $uniqueno));
	}

	public function forgot()
	{


	}

	public function forgotpassword(){

	}

	public function updatePassword(){
		$password = Password::hash($_POST['password']);
		$uniqueId = $_POST['uniqueId'];
		$privatekey = "6Lcb8tsSAAAAAJcxKb5f0AzH2fvKx1zjnlFHPqon";
		$resp = recaptcha_check_answer ($privatekey,
				$_SERVER["REMOTE_ADDR"],
				$_POST["recaptcha_challenge_field"],
				$_POST["recaptcha_response_field"]);

		if (!$resp->is_valid) {
			// What happens when the CAPTCHA was entered incorrectly

		}
		else {
			// Your code here to handle a successful verification
			return "wrong";

		}
		$result = Users::updateUser(array('password' => $password),array('uniqueno' => $uniqueId));
		if($result)
			return '1';
		else
			return '0';
	}

}

?>
