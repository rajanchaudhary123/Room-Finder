<?php 
session_start();
?>

<!DOCTYPE html>
<html>
<head>
    <title>Rooms</title>
    <link rel="stylesheet" type="text/css" href="css/style.css">
    <link rel="stylesheet" type="text/css" href="css/user.css">
    <link rel="stylesheet" type="text/css" href="css/room.css">

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

<body style="background-color:#ced6cf">
    <div class="navbar">
        <div class="logo">  Mero Ghar</div>
            <div class="info">
                <?php
                $connection = mysqli_connect('localhost','root','','users');
                    if(isset($_SESSION['email']))

                    {
                        
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
 <div class="middle">
    <form action="" method="POST">
        <label>
            <input type="text" name="search" placeholder="enter location" required/>
            <button type="submit" name="button" value="search" style="background-color:grey">Search</button>
        </label>
    </form>
    <h2 style="text-align: center;">List of Rooms</h2>

        <?php
            if(isset($_POST['search'])){
                 $que=mysqli_query($connection,"SELECT * FROM rooms left join account on rooms.number=account.number WHERE room_location like '%$_POST[search]%' ");
                if(mysqli_num_rows($que)==0){
                    echo "sorry! No rooms available at that area";
            }else{

            ?>
                <table text-align="center" boarder="1" width="100%" style="margin-left:auto; margin-right:auto;margin-bottom: 100px;">
                        <tr style="background-color:grey;">
                            <th>Room id</th>
                        <th>person name</th>    
                        <th>location</th>
                        <th>price</th>
                        <th>Total rooms</th>
                        <th>phone</th>
                        <th>tenure</th>
                        <th>detail</th>
                        <th>image</th>
                        </tr>
                        
                            <?php
 
                        
                          //getting all the required values
                        if($connection){

                               while ($row=mysqli_fetch_assoc($que))
                        {
                        ?>
                        <tr text-align="center" style="background-color:lightblue;">
                             <td><p style="font-size:15px;"><?php echo $row['roomid']; ?></p></td>
                        <td><p><?php echo $row['name']; ?></p></td>
                        <td><p><?php echo $row['room_location']; ?></p></td>
                        <td><p><?php echo $row['price']; ?></p></td>
                        <td><p><?php echo $row['totalrooms']; ?></p></td>
                        <td><p><?php echo $row['number']; ?></p></td>
                        <td><p><?php echo $row['tenure']; ?></p></td>
                        <td><p><?php echo $row['detail']; ?></p></td>
                        <td><p><?php echo "<img src='".$row['image']."' height='100' width='100'/>" ?></p></td>
                        </tr>
                <?php  }
                }
              }
                }else{
            ?>

 <table text-align="center" boarder="1" width="100%" style="margin-left:auto; margin-right:auto;">
<tr style="background-color:grey; margin-bottom: 100px;">
    <th>Room id</th>
<th>person name</th>    
<th>location</th>
<th>price</th>
<th>Total rooms</th>
<th>phone</th>
<th>tenure</th>
<th>detail</th>
<th>image</th>
</tr>

    <?php
$db=mysqli_connect('localhost','root','', 'users');

  //getting all the required values
if($db){
      $query="SELECT * FROM rooms left join account on rooms.number=account.number"  ;
      $result=mysqli_query($db,$query);
       while ($row=mysqli_fetch_assoc($result))
{
?>
<tr text-align="center" style="background-color:lightblue;">
    <td><p style="font-size:15px;"><?php echo $row['roomid']; ?></p></td>
<td><p><?php echo $row['name']; ?></p></td>
<td><p><?php echo $row['room_location']; ?></p></td>
<td><p><?php echo $row['price']; ?></p></td>
<td><p><?php echo $row['totalrooms']; ?></p></td>
<td><p><?php echo $row['number']; ?></p></td>
<td><p><?php echo $row['tenure']; ?></p></td>
<td><p><?php echo $row['detail']; ?></p></td>
<td><p><?php echo "<img src='".$row['image']."' height='100' width='100'/>" ?></p></td>
</tr>
<?php
}
}
}
?> 
</div>  
</div>  
    <div class="footer" style="height: 20px;">
    <span class="copyright">© All right reserved by Rajan and Ashish.</span>
    </div>  

</body>
</html>