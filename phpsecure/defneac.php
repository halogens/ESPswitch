
<?php
// change below suitable to your database

$conn = new mysqli("a", "aa", "aa", "a");


// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
$conn = new mysqli("a", "aa", "aa", "a");
$value1= 1;
$sql2 = "UPDATE ev
SET salonlight = 1;";
$cevap12 = $conn->query($sql2);
	exit();
