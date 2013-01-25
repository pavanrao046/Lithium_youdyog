<?php
namespace app\controllers;
session_start();

use app\models\Users;

use lithium\security\Auth;

use lithium\g11n\Message;
use lithium\storage\Session;

class UserController extends \lithium\action\Controller {

	public function register()
	{
		if($this->request->data['email']) {
			$reg = Users::create($this->request->data);
			if(($this->request->data) && $reg->save()) 
			{	
			
				return $this->redirect('User::success');	

			}
		}
		return compact('reg');	
	}
		
	public function index()
	{

		
	}
	public function success()
	{

	}

	public function forgot()
	{
		
			$privatekey = "6Lcb8tsSAAAAAJcxKb5f0AzH2fvKx1zjnlFHPqon";
                $resp = recaptcha_check_answer ($privatekey,
                                $_SERVER["REMOTE_ADDR"],
                                $_POST["recaptcha_challenge_field"],
                                $_POST["recaptcha_response_field"]);

  if (!$resp->is_valid) {
    // What happens when the CAPTCHA was entered incorrectly
    die ("<h2>The reCAPTCHA wasn't entered correctly.</h2> Go back and try it again." .
         "(reCAPTCHA said: " . $resp->error . ")");
  } 
  else {
    // Your code here to handle a successful verification
    
  }
	}

}

?>
