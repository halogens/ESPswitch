
<?php
session_start();
if( $_COOKIE["user_id"] == "change this part"){

$conn = new mysqli("aa.a.9", "a", "a", "a");


// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}// change below suitable to your page and database
$conn = new mysqli("a", "aa", "a", "ev");
$value1= 2;
$sql2 = "UPDATE ev
SET salonlight = 2;";
$cevap12 = $conn->query($sql2);

echo "oldu";
	header('Location: http://ev.leblebi19.com/index0.html'); ;

	exit();
	}
else{
	echo "olmadı";
	header('Location: http://ev.leblebi19.com/index0.html');
	exit();
	
}

