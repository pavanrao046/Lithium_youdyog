<div class="wrapper">
<legend> Login </legend>
<?= $this->form->create(null,array('action'=>'/')); ?>
<?= $this->form->field('email',array('id' => 'txtemail')); ?>
<?= $this->form->field('password',array('type' => 'password','id' => 'txtpassword')); ?>


<?php 
session_start();
use lithium\storage\Session; 
if(isset($_SESSION['loginFailed']) && $_SESSION['loginFailed'] == 1)
{
  echo '<div id="alertBox" class="alert alert-danger" style="display: block;">Login Failed</div>';
  $_SESSION['count'] += 1;
  if($_SESSION['count'] > 2)
  {
       echo "<div id='captcha'>";
       $publickey = "6Lcb8tsSAAAAAIld1G9c4CS4nkPzgkqxpghlTrqw"; // you got this from the signup page
       echo recaptcha_get_html($publickey);
       echo "</div><br/>";
  }
}

?>

<p><?= $this->form->button('Login',array('class' => 'btn btn-primary' ,'onclick' => 'if(!validateLogin())
{
	$("#alertBox").css("display","block").hide().fadeIn(200);
	$("#alertBox").html("Invalid Password");
	
	return false;
}
else{
	return true;
}
')); ?> <a href="/forgot" style="margin-left : 20px;">Forgot Password</a></p>


<div id="alertBox" class="alert alert-danger" style="display: none;"></div>
<?= $this->form->end(); ?>


</div> <!-- end wrapper div -->