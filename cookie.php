<!--  that part sets the cookies -->
<?php
session_start();
$cookie_name2 = "user_id";
// change the number below for changing the live of cookies
setcookie($cookie_name2, $_SESSION['user_password'], time() + (86400 * 365), "/"); 
// Change the header suitable to your website
header('Location: http://ev.leblebi19.com/index0.html'); 
				exit();
?>