<div class="wrapper">

<legend> Register </legend>
<?php if($_SESSION['tempuserEmail'] == null || $_SESSION['tempuserEmail'] == ""){ 
	if($isRegistered == '1')
	{?>
		<div id="alertBox" class="wrapper well alert-success" style="display: block"><center> You are now registered with youdyog.in. Please <strong> <a href="/login"> login </a> to your account. </strong></center></div>
	
<?php }else {
	?>
	<div id="alertBox" class="wrapper alert-danger" style="display: block"><center><strong> Oops! </strong> The URL seems to be broken.</center></div>
<?php }
	} 
else {
?>

<?= $this->form->create() ?>


<?= $this->form->field('first_name',array('id' => 'txtfname','placeholder'=>'', 'autocomplete' => 'off')); ?>
<div id="fnamealertBox" class="alert alert-danger" style="display: none;"></div>

<?= $this->form->field('last_name',array('id' => 'txtlname' ,'placeholder'=>'' , 'autocomplete' => 'off')); ?>
<div id="lnamealertBox" class="alert alert-danger" style="display: none;"></div>

<?= $this->form->field('email',array('type' =>'email' ,'id' => 'txtemail' , 'autocomplete' => 'off','value'=>$_SESSION['tempuserEmail'],'readonly'=>'readonly')); ?>
<div id="emailalertBox" class="alert alert-danger" style="display: none;"></div>

<?= $this->form->field('password',array('type' => 'password','placeholder'=>'Minimum 6 Characters','id' => 'password', 'name'=>'password', 'onCopy' => 'return false', 'onPaste' => 'return false',
'onblur'=>'passwordStrength(this.value,document.getElementById("strendth"),document.getElementById("passError"))')); ?>
 <span id="passError"></span><span id="strendth"></span>

<div id="passwordalertBox" class="alert alert-danger" style="display: none;"></div>
<label >Confirm Password</label>
<input type="password" id="txtcpass" placeholder="Confirm Password" onblur="comp_pass();" onCopy="return false" onPaste="return false"/>
<div id="cpasswordalertBox" class="alert alert-danger" style="display: none;"></div>

<?= $this->form->field('contact no',array('id' => 'txtcontactno', 'autocomplete' => 'off')); ?>
<div id="contactnoalertBox" class="alert alert-danger" style="display: none;"></div>

<?= $this->form->field('location',array('id' => 'txtlocation', 'autocomplete' => 'off')); ?>
<div id="locationalertBox" class="alert alert-danger" style="display: none;"></div>

<?/*= $this->form->field('status',array('id' => 'txtstatus')); */?>

<?php /*
<?= $this->form->field('confirm password',array('type' => 'password','id' => 'txtcpass', 'onblur'=>'comp_pass();', 'onCopy' => 'return false', 'onPaste' => 'return false')); ?>

$publickey = "6Lcb8tsSAAAAAIld1G9c4CS4nkPzgkqxpghlTrqw"; // you got this from the signup page
echo recaptcha_get_html($publickey);
*/?>




<p><?= $this->form->button('Register',array('class' => 'btn btn-primary','onclick' => 'if(validateRegisterPage())
{
	return true;
}
else{
	return false;
}
')); ?></p>



<div id="alertBox" class="alert alert-danger" style="display: none;"></div>
<?= $this->form->end(); ?>
<?php } ?>
</div>
