<?php session_start(); ?>

<!DOCTYPE html>
<html>
    <head>
        <title>Log in</title>
        <link rel="stylesheet" type="text/css" href="css/style.css">
        <link rel="stylesheet" type="text/css" href="css/login.css">
    </head>
    <body>
        <div class="navbar">
            <div class="logo">  Mero Ghar</div>
                <div class="info">
                    <div class="search">
                        <form method="" action="rooms.php" enctype="multipart/form-data">
                            <input type="submit" name="search" value="All Rooms"/>
                        </form>
                    </div>
                    <a href="index.php" class=home>Home</a>
                    <a href="contactus.php" class="about">Contact us</a>
                </div>
            </div>
        </div>

        <form action="" method="POST">
            <div class="loginform">
                    <h1>Login</h1>
                <div class="textbox">
                    <input type="email" placeholder="email" name="email" value="">
                </div>    
                <div class="textbox">
                    <input type="password" placeholder="password" name="pass" value="">
                </div>
                    <input type="submit" class="btn" value="login" name="login">
                <p>New to the website? <a href="signup.php">Sign up</a></p>
            </div>
        </form>
        <?php 

$connection = mysqli_connect('localhost','root','','users');
if(isset($_POST['login'])){


$email = $_POST['email'];
$password = md5($_POST['pass']);

$data = "SELECT * FROM account WHERE email='$email' && password='$password'";

$result = mysqli_query($connection,$data);
$num = mysqli_num_rows($result);
echo $num;
 if ($num==1) {
 	$_SESSION['email'] = $email;
	 $_SESSION['password'] = $password;

 	header('location:index.php');
 }else{
 	?>
	 <script type="text/javascript">
	 	alert("INVALID!! email or Password");
	</script>
<?php
 }
}
 ?>
    </body>
</html>