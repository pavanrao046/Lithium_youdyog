<?php session_start();?>
<p class="text-success" style="font-size:25px; margin-left:350px; font-family:Verdana; font-weight:bold;" >Welcome To Youdyog Home Page</p>

<a href ="/participate" style ="float:right; margin-top:300px;">Click Here To Participate</a>

<?php echo $_SESSION['email'];?>
<?php echo $temp['roles'];?>

