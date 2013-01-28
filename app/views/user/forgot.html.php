<legend> Account Recovery Page </legend>

<div id="emailContainer" class = "wrapper">
<label for="email" >Email</label>
<?= $this->form->email('email',array('id' => 'txtForgotEmail')); ?>
<?= $this->form->field('uniqueId',array('id' => 'uniqueId')); ?>
<button id="btnSubmitEmail" class="btn btn-secondary">Submit</button>
</div>

<?= $this->form->create(null,array('action'=>'forgot','method'=>'POST')); ?>

<div style="display : none;" id="newPassword" class="wrapper">
<div>
<?= $this->form->field('New Password',array('type'=>'password','id' => 'npass', 'autocomplete' => 'off','placeholder'=>'Enter New Password','class'=>'input-medium')); ?>
</br>
<?= $this->form->field('Confirm Password',array('type'=>'password','id' => 'cpass', 'autocomplete' => 'off','placeholder'=>'Re-Enter New Password','class'=>'input-medium')); ?>
</div>
<?php
$publickey = "6Lcb8tsSAAAAAIld1G9c4CS4nkPzgkqxpghlTrqw"; // you got this from the signup page
echo "<span style='margin-top:30px; margin-left: 10px;'>".recaptcha_get_html($publickey)."</span>";
?>

</br>
<p><?= $this->form->submit('Submit',array('class'=>'btn-small btn-primary')); ?></p>

</div>
<?= $this->form->end(); ?>
