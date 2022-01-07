<?php
session_start();
?>

<DOCTYPE html>
    <html>
    <head>
        <title>project1</title>
        <link rel="stylesheet" type="text/css" href="cs/style.css">
        <link rel="stylesheet" type="text/css" href="cs/userstyle.css">
        <link rel="stylesheet" href="./cs/signupstyle.css">
        <style>
    table,td,th
    {
    padding:2px;
    border-collapse:collapse;
    font-family:Georgia, "Times New Roman", Times, serif;
    border:solid #ddd 2px;
    }
    </style>
    </head> 

        <body>
        <div class="navbar">
            <div class="logo">  Mero Ghar</div>
                <div class="info">
                    <?php

                    if(isset($_SESSION['admin_email']))

                    {
                        $connection = mysqli_connect('localhost','root','','users');
                        $q=mysqli_query($connection,"select * from admins where admin_email='$_SESSION[admin_email]';");
                        $row= mysqli_fetch_assoc($q);
                        ?>
                    <a href="users.php" class="users">Registered users</a>
                    <a href="admin_rooms.php" class="rooms">Registered rooms</a>
                    <a href="admin_info.php"><?php echo $row['admin_name'];?></a>
                    <button style="background:red;"> <a href="admin_logout.php">logout</a></button>
                    <?php
                    }
                    ?>
                </div>

            </div>
        </div>

            <?php 
                $connection = mysqli_connect('localhost','root','','users');
                $q=" SELECT * FROM admins WHERE admin_email= '$_SESSION[admin_email]'";
                $result= mysqli_query($connection,$q) or die(mysql_error());

                while($row= mysqli_fetch_assoc($result)){
                    $name=$row['admin_name'];
                    $city=$row['city'];
                    $country=$row['country'];
                    $number=$row['number'];
                    $email=$row['admin_email'];
                    $password=$row['admin_password'];
                }
            ?>

<form action="" method="POST" enctype="">
        <div class="signupform">
        <h2 style= "margin-top:250px; border-bottom: 6px solid greenyellow;">Edit Profile</h2>
            <label><h4><b>Name:</b></h4></label>
            <div class="textbox">
                <input type="text" name="name1" value="<?php echo $name ;?>" required>
            </div>
            <label><h4><b>Number:</b></h4></label>
            <div class="textbox">
                <input type="text" name="number" value="<?php echo $number ; ?>" required>
            </div>
            <div class="textbox">
            <label><h4><b>Email:</b></h4></label>
                <input type="email" name="admin_email" value="<?php echo $email ; ?>"required>
            </div> 
            <label><h4><b>city:</b></h4></label>
            <div class="textbox">
                <input type="text" name="city" value="<?php echo $city; ?>" required>
            </div>
            <label><h4><b>country:</b></h4></label>
            <div class="textbox">
                <input type="text" name="country" value="<?php echo $country; ?>" required>
            </div>
            <label><h4><b>Password:</b></h4></label>   
            <div class="textbox">
                <input type="text" name="admin_password" value="<?php echo $password ; ?>" required>
            </div>
                <input type="submit" class="btn" name="submit" value="save">
            </form>
            <?php
                if(isset($_POST['submit']))
                {
                    
                    $name=$_POST['name1'];
                    $city=$_POST['city'];
                    $country=$_POST['country'];
                    $number=$_POST['number'];
                    $email=$_POST['admin_email'];
                    $password=$_POST['admin_password'];
                    $q1="UPDATE admins SET admin_name='$name',city='$city',country='$country',number='$number', admin_email='$email',admin_password='$password' WHERE admin_email='".$_SESSION['admin_email']."';";

                    if(mysqli_query($connection,$q1)){
                        ?>
                            <script type="text/javascript">
                                alert("update successfull!");
                            </script>
                  <?php
                    }else{
                        ?>
                         <script type="text/javascript">
                                alert("eror");
                            </script>
                <?php    }
                }
                  ?>
        <body>
        </html>
