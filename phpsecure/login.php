




<?php

session_start();
// change below suitable to your database
$conn = new mysqli("a", "a", "aaaa", "aaa");
$email=  mysqli_real_escape_string($conn, $_POST["user_email"]);
$password=  mysqli_real_escape_string($conn, $_POST["user_password"]);


if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
echo "Connected successfully";

$sql = "SELECT user_id FROM user_info where user_email = '$email' ;";
$sql2 = "SELECT user_id FROM user_info where user_password = '$password' ;";




$cevap1 = $conn->query($sql);
$cevap2 = $conn->query($sql2);

if ($cevap1->num_rows > 0 AND $cevap2->num_rows > 0) {
       $row = $cevap1->fetch_assoc();
		     $row2 = $cevap2->fetch_assoc();

				 if( isset($row["user_id"]) AND isset($row2["user_id"])  ){
				 if( $row["user_id"] == $row2["user_id"] ){

$_SESSION['user_id'] = $row["user_id"];
$_SESSION['user_password'] = $_POST["user_password"];

echo "Value is: " .$_SESSION['user_id'];
echo "Value is: " .$_SESSION['user_password'];



// if the log in is successfull
				 echo "<meta charset='UTF-8' >Giris BASARILI";
				 // change the header suitable to your webpage
				header('Location: http://ev.leblebi19.com/cookie.php'); 
				exit();

				 }
				 }
				 else { // if it is not successfull
				 echo "<meta charset='UTF-8' ><h1>hatalı bilgiler girdiniz. lutfen bir onceki sayfaya giderek bilgiri yeniden giriniz.</h1>";

				 }






}





else {// if it is not successfull
    echo "<meta charset='utf-8' > <h1>hatali bilgiler girdiniz. lutfen bir onceki sayfaya giderek bilgileri yeniden giriniz.</h1>";

}










?>






</body>
</html>
