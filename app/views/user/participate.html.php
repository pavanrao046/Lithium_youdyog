<?php 
use \app\controllers\Constants;
?>
<p class="text-info" style= "font-size:25px; margin-left:450px; font-family:Verdana; font-weight:bold;">Participate Page</p>
<div id="container">
<div id="container1" align="center">
<?= $this->form->create(); ?>
<p class="text-success" style="font-size:20px; margin-top:60px; font-family:Times New Roman; font-weight:bold;">Would you like to participate?</p>
<label style=" margin-left:-90px; font-family:Verdana; font-weight:bold;">
<?= $this->form->radio('part',array('id'=>'rd_part_yes','value'=>'0','onclick'=>'showdiv("container3"); hidediv("container2");')); ?>
Yes</label>
<label style="margin-top:-25px; margin-left:100px; font-family:Verdana; font-weight:bold;">
<?= $this->form->radio('part',array('id'=>'rd_part_no','value'=>Constants::ROLE_MEMBER,'onclick'=>'showdiv("container2"); hidediv("container3");')); ?>
No</label>

</div>


<div id="container2" align="center" style="display:none" >
<p class="text-success" style="font-size:20px; margin-left:30px; margin-top:60px; font-family:Times New Roman; font-weight:bold;">Would you like to take Survey as end user?</p>

<input type="submit" id="btnusercontinue" style="margin-left:0px; margin-top:20px;"  class =" btn btn-primary" value="Continue"/>
<button type="button" id="btnexit"  style="margin-left:0px; margin-top:20px;" class =" btn btn-primary" onclick="self.location='/logout'">Exit</button>
</div>


<div id="container3" style="display:none" >
<label style=" margin-left:450px; margin-top:30px; font-family:Verdana; font-weight:bold;">
<?= $this->form->radio('participate',array('id'=>'rd_partner','value'=>Constants::ROLE_PARTNER,'onclick'=>'showdiv("divContinue");')); ?>
 Partner</label>
</br><label style=" margin-left:600px; margin-top:-45px; font-family:Verdana; font-weight:bold;">
<?= $this->form->radio('participate',array('id'=>'rd_provider','value'=>Constants::ROLE_PROVIDER,'onclick'=>'showdiv("divContinue");')); ?>
 Provider</label>

</br>

<div id="divContinue" align="center" style="display:none;">
<input type="submit" id="btncontinue" style="margin-top:10px;" class="btn btn-primary" onclick="Surveybtn()" value="Continue"/>
</div>

</div>

</div>
<?= $this->form->end(); ?>