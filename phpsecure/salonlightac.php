
<?php
session_start();
if( $_COOKIE["user_id"] == "secret password change this part"){

$conn = new mysqli("a", "aa", "aa", "a");


// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
// change below suitable to your page and database
$conn = new mysqli("a9.9", "l", "a", "a");
$value1= 1;
$sql2 = "UPDATE ev
SET salonlight = 1;";
$cevap12 = $conn->query($sql2);
echo "oldu"; // it is done
	header('Location: http://ev.leblebi19.com/index0.html'); ;

	exit();
	}
else{
	echo "olmadı"; // error 
	header('Location: http://ev.leblebi19.com/index0.html');
	exit();
	
}


