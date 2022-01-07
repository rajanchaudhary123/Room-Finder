<?php 
session_start();
?>
    <!DOCTYPE html>
    <html>
    <head>
        <title>Welcome to Our website</title>
        <link rel="stylesheet" type="text/css" href="css/style.css">
        <link rel="stylesheet" type="text/css" href="css/user.css">
    </head> 
    
    <body>
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
                    <a href="userinfo.php"><?php echo $row['name'];
                    ?></a>
                    <button style="background:red;"> <a href="logout.php">logout</a></button>
                </div>

            </div>
        </div>
    <div class="middle-part">
        <div class="middle-text">
            <p>Make your searching easy</p><br>
            <button class="add"><a href="addform.php">create new add</a></button>
        </div>
    </div>  
    <?php
    }else{
    ?>
                    <div class="search">
                        <form method="" action="rooms.php" enctype="multipart/form-data">
                            <input type="submit" name="search" value="All Rooms"/>  
                        </form>
                    </div>
                    <a href="index.php" class="home">Home</a>
                    <a href="contactus.php" class="about">Contact us</a>
                    <a href="admin/admin_login.php" class="admin">Admin</a>
                </div>

            </div>
        </div>
    <div class="middle-part">
        <div class="middle-text">
            <p class="index__text">Make your searching easy</p><br>
            <button class="signup"><a href="signup.php">sign up</a></button>
            <button class="login"><a href="login.php">login</a></button>
        </div>
    </div> 
    <?php
    }
    ?>
    <div class="footer">
    <span class="copyright">© All right reserved by Rajan and Ashish.</span>
    </div>  

    </body>
</html>