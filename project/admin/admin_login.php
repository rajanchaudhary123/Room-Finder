<?php session_start(); ?>

<!DOCTYPE html>
<html>
    <head>
        <title></title>
        <link rel="stylesheet" type="text/css" href="cs/style.css">
        <link rel="stylesheet" type="text/css" href="cs/loginstyle.css">
    </head>
    <body>
        <div class="navbar">
            <div class="logo">  Mero Ghar</div>
                <div class="info">
                    <div class="search">
                        <form method="" action="" enctype="multipart/form-data">
                            <input type="submit" name="search" value="All Rooms"/>
                        </form>
                    </div>
                    <a href="../index.php" class=home>Home</a>
                    <a href="../contactus.php" class="about">Contact us</a>
                </div>
            </div>
        </div>

        <form action="" method="POST">
            <div class="loginform">
                    <h1>Login</h1>
                <div class="textbox">
                    <input type="email" placeholder="email" name="admin_email" value="">
                </div>    
                <div class="textbox">
                    <input type="password" placeholder="password" name="admin_pass" value="">
                </div>
                    <input type="submit" class="btn" value="login" name="login">
            </div>
        </form>
        <?php 

$connection = mysqli_connect('localhost','root','','users');
if(isset($_POST['login'])){


$email = $_POST['admin_email'];
$password = $_POST['admin_pass'];


$data = "SELECT * FROM admins WHERE admin_email='$email' && admin_password='$password'";


$result = mysqli_query($connection,$data);
$num = mysqli_num_rows($result);
 if ($num==1) {
 	$_SESSION['admin_email'] = $email;
	 $_SESSION['admin_password'] = $password;

 	header('location:admin_info.php');
 }else{
 	?>
	 <script type="text/javascript">
	 	alert("INVALID!! admin");
	</script>
<?php
 }
}
 ?>
    </body>
</html>