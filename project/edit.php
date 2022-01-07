<?php
session_start();
?>

<DOCTYPE html>
    <html>
        <head>
        <link rel="stylesheet" type="text/css" href="css/signup.css">
        <link rel="stylesheet" type="text/css" href="css/style.css">
        </head>
        <body >
        <div class="navbar">
            <div class="logo">  Mero Ghar</div>
                <div class="info">
                    <?php

                    if(isset($_SESSION['email']))

                    {
                        $connection = mysqli_connect('localhost','root','','users');
                        $q=mysqli_query($connection,"select * from account where email='$_SESSION[email]';");
                        $row= mysqli_fetch_assoc($q);
                        ?>
                    <div class="search">
                        <form method="" action="rooms.php" enctype="multipart/form-data">
                            <input type="submit" name="search" value="All Rooms"/>
                        </form>
                    </div>
                    <a href="index.php" class=home>Home</a>
                    <a href="contactus.php" class="about">Contact us</a>
                    <a href="userinfo.php"><?php echo $row['name'];?></a>
                    <button style="background:red;"> <a href="logout.php">logout</a></button>
                    <?php
                    }
                    ?>
                </div>

            </div>
        </div>

            <?php 
                $connection = mysqli_connect('localhost','root','','users');
                $q=" SELECT * FROM account WHERE email= '$_SESSION[email]'";
                $result= mysqli_query($connection,$q) or die(mysql_error());

                while($row= mysqli_fetch_assoc($result)){
                    $name=$row['name'];
                    $location=$row['location'];
                    $number=$row['number'];
                    $email=$row['email'];
                    $password=$row['password'];
                }
            ?>

<form action="" method="POST" enctype="multipart/form-data">
        <div class="signupform">
        <<h2 style= "margin-top:250px; border-bottom: 6px solid greenyellow;">Edit Profile</h2>
            <label><h4><b>Name:</b></h4></label>
            <div class="textbox">
                <input type="text" name="name1" value="<?php echo $name ;?>" required>
            </div>
            <label><h4><b>Upload a photo:</b></h4></label>
            <div class="textbox">
                <input type="file"  name="images">
            </div>
            <label><h4><b>Location:</b></h4></label>
            <div class="textbox">
                <input type="text" name="location" value="<?php echo $location; ?>" required>
            </div>
            <label><h4><b>Number:</b></h4></label>
            <div class="textbox">
                <input type="text" name="number" value="<?php echo $number ; ?>" required>
            </div>
            <div class="textbox">
            <label><h4><b>Email:</b></h4></label>
                <input type="email" name="email" value="<?php echo $email ; ?>"required>
            </div> 
            <label><h4><b>Password:</b></h4></label>   
            <div class="textbox">
                <input type="text" name="password" value="<?php echo $password ; ?>" required>
            </div>
                <input type="submit" class="btn" name="submit" value="save">
            </form>
            <?php
                if(isset($_POST['submit']))
                {
                    
                    $name=$_POST['name1'];
                    $location=$_POST['location'];
                    $number=$_POST['number'];
                    $email=$_POST['email'];
                    $password=$_POST['password'];
                    if(isset($_FILES['images'])){
                        $filename= $_FILES['images']['name'];
                        $tempname=$_FILES['images']['tmp_name'];
                        $folder="images/".$filename;
                        move_uploaded_file($tempname, $folder);
                    }

                    $q1="UPDATE account SET name='$name',location='$location',number='$number',email='$email',password='$password', pic='$folder' WHERE email='".$_SESSION['email']."';";

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