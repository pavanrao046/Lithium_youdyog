<h3>ADD USER</h3>  
<?= $this->form->create(); ?>

<?= $this->form->field('referal_email',array('id' => 'txtrefemail')); ?>
<div id="refemailalertBox" class="alert alert-danger" style="display: none;"></div>

<?= $this->form->field('email',array('id' => 'txtuseremail')); ?>
<div id="useremailalertBox" class="alert alert-danger" style="display: none;"></div>

<p><?= $this->form->button('Add User',array('onclick' => 'if(validateInvitePage())
{
	return true;
}
else{
	return false;
}
')); ?></p>

<div id="alertBox" class="alert alert-danger" style="display: none;"></div>
<?= $this->form->end(); ?>







 




