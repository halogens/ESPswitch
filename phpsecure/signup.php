
<?php
session_start();
// change below suitable to your page and database
$conn = new mysqli("a", "a", "a", "a");


// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}











$AAa ="";

if($_POST['user_firstname'] == $AAa OR $_POST['user_lastname'] == $AAa OR
 $_POST['user_password'] == $AAa OR  $_POST['user_email'] == $AAa OR $_POST['user_tokenused'] == $AAa   )
{
   echo '<h1 style =" color:yellow; font-size: 300%;  "> Bilgilerden bir yada bir kaçı eksik</h1>';
 include '../signup.html';
 }
else{




// will not be used in this project but you can use it if you want
function tokenkontrol ($token)
{$conn = new mysqli("a", "a", "a", "a");
$value5= mysqli_real_escape_string($conn, $_POST["user_tokenused"]);



	$kontroltoken= " select * from user_info where user_tokenused='$value5'; ";
	$cevap = $conn->query($kontroltoken);


	if ($cevap->num_rows > 0) {

        echo '<h1 style =" color:yellow; font-size: 300%;  "> Bilet daha önce kullanılmış</h1>';
       include '../signup.html';


				return false;
	    }

	 else {
     $kontroltoken2= " select * from user_token where token='$value5'; ";
   	$cevap2 = $conn->query($kontroltoken2);

    if ($cevap2->num_rows > 0) {

  				return TRUE;
  	    }

  	 else {

 echo '<h1 style =" color:yellow; font-size: 300%;  "> Bilet bulunamadı.</h1>';
include '../signup.html';
 return FALSE;
}













	}


}
if(isset( $_POST['user_firstname'])){


$conn = new mysqli("a", "a9", "a", "a");

$value7=  "1000";
$value5= mysqli_real_escape_string($conn, $_POST["user_tokenused"]);
$value1= mysqli_real_escape_string($conn, $_POST["user_firstname"]);
$value2= mysqli_real_escape_string($conn, $_POST["user_lastname"]);
$value3= mysqli_real_escape_string($conn, $_POST["user_password"]);
$value4= mysqli_real_escape_string($conn, $_POST["user_email"]);

$value6= mysqli_real_escape_string($conn, $_POST["user_student"]);

$sql = "INSERT INTO user_info(
user_firstname,
user_lastname,
user_password,
user_email,
user_tokenused,
user_student,
user_type)
 values (
'$value1',
'$value2',
'$value3',
'$value4',
'$value5',
'$value6',
'$value7'
);";

if (tokenkontrol($_POST['user_tokenused']) == TRUE) {
	if($conn->query($sql) === TRUE){
   
	include'login.php';
include 'cookies.php';
	exit();
	
	
	
	
	

}  else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}
}
else{ // token kullanılmış
	;
}}}


?>
