


<?php

session_start();



 include './phpsecure/dbfunc.php';

if ($_POST["username"] == "" OR $_POST["password"] == "") {
  echo "<h1>Bilgilerin bir yada bir kaçı eksik</h1>";
exit();
}


 // Html formundan aldığımız bilgileri sql injection a karşı korumaya alıyorum.
 $username=  dbsecure($_POST["username"]);
$password= dbsecure($_POST["password"]);

$max = intval(db("SELECT MAX(user_id) FROM users","MAX(user_id)"));
$max = $max + 1;
// user name daha önce alınmış mı

	$kontroltoken= " select user_id from users where user_name='$username'; ";
	$cevap = $conn->query($kontroltoken);
	if (intval($cevap->num_rows) > 0) {

        echo '<h1 style =" color:yellow; font-size: 300%;  "> Başka bir kullanıcı adı seçin.</h1>';
      exit();

	    }
	if ($cevap->num_rows < 1) {
$conn->query("insert into users (user_id,user_password,izin,user_name) values ('$max','$password',3,'$username' );");

$id1 = db(   "SELECT user_id FROM users where user_name = '$username' ;  "  ,     "user_id") ;
$id4 = db("SELECT user_password FROM users where user_password = '$password' ;","user_password") ;
setcookie("user_password", $id4, time() + (86400 * 365), "/");
setcookie("user_id", $id1, time() + (86400 * 365), "/");
 header('Location: http://ev.leblebi19.com/index.php');
exit();

}



// güle güle
