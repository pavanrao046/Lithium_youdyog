
<p class="text-info" style= "font-size:25px; margin-left:450px; font-family:Verdana; font-weight:bold;">Participate Page</p>
<div id="container">
<div id="container1" align="center">
<?= $this->form->create(null,array('action'=>'/')); ?>
<p class="text-success" style="font-size:20px; margin-top:60px; font-family:Times New Roman; font-weight:bold;">Would you like to participate?</p>
<label style=" margin-left:-90px; font-family:Verdana; font-weight:bold;">
<?= $this->form->radio('part',array('name' => 'radiogroup','id'=>'part_yes','value'=>'Yes','onclick'=>'showdiv("container3"); hidediv("container2"); getCurrentRole()')); ?>
Yes</label>
<label style="margin-top:-25px; margin-left:100px; font-family:Verdana; font-weight:bold;">
<?= $this->form->radio('part',array('name' => 'radiogroup','id'=>'part_no','value'=>'Member','onclick'=>'showdiv("container2"); hidediv("container3"); getCurrentRole()')); ?>
No</label>
<?= $this->form->field('',array('type' => 'text' ,'name' => 'role' ,'id' =>'role'));?>
</div>


<div id="container2" align="center" style="display:none" >
<p class="text-success" style="font-size:20px; margin-left:30px; margin-top:60px; font-family:Times New Roman; font-weight:bold;">Would you like to take Survey as end user?</p>

<button type="button"  style="margin-left:0px; margin-top:20px;"  class =" btn btn-primary" onclick="window.location.href='/profile'">Continue</button>
<button type="button"  style="margin-left:0px; margin-top:20px;" class =" btn btn-primary" onclick="window.location.href='/logout'">Exit</button>
</div>


<div id="container3" style="display:none" >
<label style=" margin-left:450px; margin-top:30px; font-family:Verdana; font-weight:bold;">
<?= $this->form->radio('participate',array('name' => 'radiogroup','id'=>'par_yes','value'=>'Yes','onclick'=>'showdiv("button"); getCurrentRole()')); ?>
 Partner</label>
</br><label style=" margin-left:600px; margin-top:-45px; font-family:Verdana; font-weight:bold;">
<?= $this->form->radio('participate',array('name' => 'radiogroup','id'=>'par_no','value'=>'No','onclick'=>'showdiv("button"); getCurrentRole()')); ?>
 Provider</label>
</div>
</br>

<div id="button" align="center" style="display:none;">
<button id="btnContinue"  style="  margin-top:10px;" class ="btn btn-primary "onclick="window.location.href='/profile'">Continue</button>
</div>

</div>
<?= $this->form->end(); ?>
