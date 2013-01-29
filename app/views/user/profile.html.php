<div class="wrapper" style="height:150px" id="interestsdetails">
<legend>Survey</legend>
<?php 	
	$hows = $interestsArray[0];
	$whats = $interestsArray[1];
	$whichs = $interestsArray[2];
	$wheres = $interestsArray[3];
?>
<div id="selectInterests">
	<div id="selectHows" class="pull-left">
		<label for="how"> How </label>
		<select id="how">
			<?php 
				foreach($hows as $how)
				{
					echo "<option value = '".$how['_id']."'> ".$how['name']."</option>";
				}	
			?>
		</select>
	</div>
	
	<div id="selectWhats" class="pull-left">
		<label for="what"> What </label>
		<select id="what">
			<?php 
				foreach($whats as $what)
				{
					echo "<option value = '".$what['_id']."'> ".$what['name']."</option>";
				}	
			?>
		</select>
	</div>
	
	<div id="selectWhichs" class="pull-left">
		<label for="which"> Which </label>
		<select id="which">
			<?php 
				foreach($whichs as $which)
				{
					echo "<option value = '".$which['_id']."'> ".$which['name']."</option>";
				}	
			?>
		</select>
	</div>
	
	<div id="selectWheres" class="pull-left">
		<label for="where"> Where </label>
		<select id="where">
			<?php 
				foreach($wheres as $where)
				{
					echo "<option value = '".$where['_id']."'> ".$where['name']."</option>";
				}	
			?>
		</select>
	</div>
<!-- 
<?php 
	echo "<table id = 'tblInterests' class='table-striped table-bordered table-hover'>"; 						
		echo "<tr>";
			echo "<th>How</th>";
			echo "<th>What</th>";
			echo "<th>Which</th>";
			echo "<th>Where</th>";
		echo "</tr>"; 		
	echo "</table>";
?>
 -->
</div>
