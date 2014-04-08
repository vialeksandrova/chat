<?php
ob_start();//включва output buffering и позволява първо да се include-нат файловете с html-a, a след това да ползваме пренасочването header()
session_start();
$titleName='Login';
include "includes/header.php";
include "functions.php";

if($_POST){
$username=trim($_POST['username']);
$password=trim($_POST['password']);
$username_esc=mysqli_real_escape_string($db_connection,$username);
$password_esc=mysqli_real_escape_string($db_connection,$password);

if(!empty($_POST['username'])&&!empty($_POST['password'])){
$username=$_POST['username'];
$password=$_POST['password'];

$q=mysqli_query($db_connection, "SELECT * FROM users WHERE username='$username_esc' && password='$password_esc'");//има ли такъв потребител в БД
if(mysqli_num_rows($q)>0) {
//echo "Hello, $username!"; 
header('Location: messages.php');
ob_end_flush();
exit;
}
else
{
echo "Invalid username or password. Try again!";
}
}
}
?>
<a href="registration.php">Registration</a>
<form method="POST">
<div>Username:<input type="text" name="username"/></div>
<div>Password:<input type="password" name="password"/></div>
<input type="submit" value="Sign in">
</form>

<?php
include "includes/footer.php";
?>
