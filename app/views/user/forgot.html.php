<h2> Account Recovery Page </h2>

<?= $this->form->create(null,array('action'=>'forgot','method'=>'POST')); ?>

<div class="container">
<div class ="span4">
<?= $this->form->field('New Password',array('type'=>'password','id' => 'npass', 'autocomplete' => 'off','placeholder'=>'Enter New Password','class'=>'input-medium search-query')); ?>
</br>
<?= $this->form->field('Confirm Password',array('type'=>'password','id' => 'cpass', 'autocomplete' => 'off','placeholder'=>'Re-Enter New Password','class'=>'input-medium search-query')); ?>
</div>
<?php
echo "</br></br></br></br></br></br></br></br>";
$publickey = "6Lcb8tsSAAAAAIld1G9c4CS4nkPzgkqxpghlTrqw"; // you got this from the signup page
echo "<span style='margin-top:30px; margin-left: 10px;'>".recaptcha_get_html($publickey)."</span>";
?>

</br>
<p><?= $this->form->submit('Submit',array('class'=>'btn-small btn-primary')); ?></p>

</div>
<?= $this->form->end(); ?>
