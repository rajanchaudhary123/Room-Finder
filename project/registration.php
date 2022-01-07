<?php
session_start();
$connection = mysqli_connect('localhost','root','');

mysqli_select_db($connection,'users');

$name = $_POST['name'];
$location = $_POST['location'];
$phone = $_POST['phone'];
$email = $_POST['email'];
$pass1 = $_POST['pass1'];
$pass2 = $_POST['pass2'];
$pass1 = md5($pass1);
$pass2 = md5($pass2);

$unique = "SELECT * FROM account WHERE email='$email'";

$result = mysqli_query($connection,$unique);
$num = mysqli_num_rows($result);
 if ($num==1) {
 	echo "email is already taken";
 }elseif($pass1!=$pass2){
		echo "password do not match";
 }
 else{
 	$registration = "INSERT INTO account(name,location,number,email,password,pic) VALUES('$name','$location','$phone','$email','$pass1','images/index.png')";
 	if(mysqli_query($connection,$registration)){
 	header('location:login.php');
     }else{
         echo "error" . $registration . "<br>" . mysqli_error($connection);
     }
 }
 ?>