<?php 
session_start();
?>

<!DOCTYPE html>
<html>
    <head>
        <title>contact</title>
        <link rel="stylesheet" type="text/css" href="css/style.css">
        <link rel="stylesheet" type="text/css" href="./css/contact.css">
        <link rel="stylesheet" type="text/css" href="css/room.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css"/>
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
                                <form method="POST" action="rooms.php" enctype="multipart/form-data">
                                    <input type="submit" name="search" value="All Rooms"/>  
                                </form>
                            </div>
                            <a href="index.php" class=home>Home</a>
                            <a href="contactus.php" class="about">Contact us</a>
                            <a href=userinfo.php><?php echo $row['name'];?></a>
                            <button style="background:red;"> <a href="logout.php">logout</a></button>
                </div>

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
        <a href="index.php" class=home>Home</a>
        <a href="contactus.php" class="about">Contact us</a>
    </div>

            </div>
        </div>
<?php        
}
?>

    <div class="contact-main z-depth-3">
      <center>
        <p class="head">CONTACT US AT</p>
      </center>
      <br />
      <div class="row light-blue lighten-5 z-depth-4">
        <div class="col-sm-3">
          <img class="circle" src="images/DSC_2027.JPG" width="100" height="100" />
        </div>
        <div class="col-sm-9">
          <p class="name">Rajan Chaudhary</p>
          <p class="post"><b>Frontend Developer</b></p>
          <p class="data">
              Student At NCIT college , Kathmandu<br>
              Reach Me At 9804750584<br>
              Email : chaudharyrajan903@gmail.com
          </p>
        </div>
      </div>
      <br />
      <div class="row red lighten-5 z-depth-4">
        <div class="col-sm-3">
          <img class="circle" src="images/IMG_7805.JPG" width="100" height="100" />
        </div>
        <div class="col-sm-9">
        <p class="name">Ashish Sapkota</p>
          <p class="post"><b>Frontend Developer</b></p>
          <p class="data">
              Student At NCIT college , Kathmandu<br>
              Reach Me At 9840066162<br>
              Email : aryanashish223@gmail.com
          </p>
        </div>
      </div>
    </div>
            </div>
        </div>
    </div>

        <div class="footer">
            <span class="copyright">© All right reserved by Rajan and Ashish.</span>
        </div>
</body>

 </html>       