<?php 
ob_start();
$titleName='Registration';
include "includes/header.php";
include "functions.php";

if($_POST){
$username=trim($_POST['username']);
$password=trim($_POST['password']);
$email=trim($_POST['email']);
$username_esc=mysqli_real_escape_string($db_connection,$username);
$password_esc=mysqli_real_escape_string($db_connection,$password);
$email_esc=mysqli_real_escape_string($db_connection,$email);
if(mb_strlen($username)<5 || mb_strlen($password)<5){
echo "Invalid username or password.";
}
else{
$q=mysqli_query($db_connection, "SELECT * FROM users WHERE username='$username_esc'");//има ли такъв потребител в БД
if(mysqli_num_rows($q)>0) {
echo "This username is not available.";
}
else{
$q=mysqli_query($db_connection, "INSERT INTO users(username, password, email) VALUES ('$username_esc','$password_esc','$email_esc')");
//echo"The registration is complete.";
header('Location: index.php');
ob_end_flush();
exit;
}
}
}
?>
<form method="POST">
<div>*Type your username:<input type="text" name="username"/></div>
<div>*Type your password:<input type="password" name="password"/></div>
<div>Type your email:<input type="text" name="email"/></div>
<div>* - must type these fields</div>
<input type="submit" value="Register">
</form>

<?php
include "includes/footer.php";
?>
