<h2>Profile Page</h2>
<select name="dropdown">
<?php
    $options = array('option1' => 'option 1',
                 'option2' => 'option 2',
                 'option3' => 'option 3');
    foreach($options as $value => $caption)
   {
        echo "<option value=\"$value\">$caption</option>";
   }
?>
</select>

<select name="birthday">
<?php
  for($i=19; ($i < 60); $i++)
  {
       echo '<option value="' .$i. '">' .$i. '</option>';
  }
?>
</select>
