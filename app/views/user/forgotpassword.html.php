<div id="newPassword" class="wrapper">
<legend> Reset Password </legend>
<div id="innerWrapper">
<label for="txtNewPassword"> New Password </label>
<input type="password" id="txtNewPassword" placeholder= "Enter New Password" />
<label for="txtConfirmPassword"> Confirm Password </label>
<input type="password" id="txtConfirmPassword" placeholder= "Re-enter Password" />
<?php
$publickey = "6Lcb8tsSAAAAAIld1G9c4CS4nkPzgkqxpghlTrqw"; // you got this from the signup page
echo "<span style='margin-top:30px; margin-left: 10px;'>".recaptcha_get_html($publickey)."</span>";
?>
<br>
<button id="btnResetPassword" class="btn btn-primary"> Submit </button>
<br>
<br>
</div>
<div id="alertNewPassword"> </div>
</div>