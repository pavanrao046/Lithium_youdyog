<?php session_start(); ?>
<h3  style=" position:absolute; top:30px; left:450px;"> List Of Users Registered  </h3>  
<?php echo 'role:'. $_SESSION['role']; ?>
	<p>
	<table border="0" cellspacing="1" cellpadding="2" width="80%" bgcolor="#EFEFEF" hspace="80" style=" position:absolute; top:70px; left:40px;"> 
	<tr>
		<th  align = "left"><?php echo ("Email");?></th>
	    <th  align = "left"><?php echo ("First Name");?></th>
	    <th  align = "left"><?php echo ("Last Name");?></th>
		<th  align = "left"><?php echo ("Referal Email");?></th>
	    <th  align = "left"><?php echo ("Roles");?></th>
	    <th  align = "left"><?php echo ("Status");?></th>
	    <th  align = "left"><?php echo ("Created Time");?></th>
	    <th  align = "left"><?php echo ("Updated Time");?></th>
	    <th  align = "left"><?php echo ("Contact No");?></th>
	    <th  align = "left"><?php echo ("Location");?></th>
  </tr>
	
	<tr style="background-color:<?php echo $this->cycle(array("#FFFFFF","#F0F0F0"))->next()?>"></tr>

</table>
</p>




