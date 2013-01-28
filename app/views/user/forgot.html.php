<legend> Account Recovery Page </legend>

<div id="emailContainer" class = "wrapper">
<label for="email" >Email</label>
<?= $this->form->email('email',array('id' => 'txtForgotEmail')); ?>
<?= $this->form->field('uniqueId',array('id' => 'uniqueId')); ?>
<button id="btnSubmitEmail" class="btn btn-secondary">Submit</button>
</div>
