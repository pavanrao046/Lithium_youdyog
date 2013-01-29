<?= $this->form->create();?>
<div class="wrapper" style="height:150px" id="interestsdetails">
<legend>Survey</legend>
<div class="pull-left" style="margin-left: 30px">

<?= $this->form->field('How', array('type' => 'select', 'list' => array('Learn'=>'Learn','Teach' => 'Teach','Appreciate' => 'Appreciate','Critic' => 'Critic','Practice' => 'Practice','Engage' => 'Engage','Marketting' => 'Marketting'))); ?>
</div><div class = "pull-left" style="margin-left:30px">
<?= $this->form->field('What', array('type' => 'select', 'list' => array('Sports' => 'Sports','Education' => 'Education','Art' => 'Art','Travell' => 'Travell','Cook' => 'Cook','Volunteer' => 'Volunteer'))); ?>
</div>
<div class = "pull-left" style="margin-left:30px">
<?= $this->form->field('Where', array('type' => 'select', 'list' => array('School' => 'School','Office' => 'Office','Public Functions' => 'Public Functions','Charity' => 'Charity'))); ?>
</div>
<div class="pull-left" style="margin-left: 30px">
</br>
<?= $this->form->button('Add',array('class' => 'btn btn-primary')); ?>
</div>
</div> 
<?= $this->form->end(); ?>

<?php echo "<table id = 'tblInterests' class='table-striped table-bordered table-hover'>"; 
						
echo "<tr>";
echo "<th>How</th>";
echo "<th>What</th>";
echo "<th>Where</th>";
echo "</tr>"; 				

echo "<tr>";
echo "<td>" . $detail['How'] . "</td>";
echo "<td>" . $detail['What']. "</td>";
echo "<td>" . $detail['Where']. "</td>";
echo "</tr>";
echo "</table>";
?>
