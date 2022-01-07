<?php 
session_start();
?>

<!DOCTYPE html>
<html>
<head>
    <title>project1</title>
    <link rel="stylesheet" type="text/css" href="cs/style.css">
    <link rel="stylesheet" type="text/css" href="cs/userstyle.css">
    <link rel="stylesheet" type="text/css" href="cs/roomstyle.css">

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
                    if(isset($_SESSION['admin_email']))

                    {
                        
                        $q=mysqli_query($connection,"select * from admins where admin_email='$_SESSION[admin_email]';");
                        $row= mysqli_fetch_assoc($q);
                ?>
                <a href="users.php" class="users">Registered users</a>
                <a href="admin_rooms.php" class="rooms">Registered rooms</a>
                <a href="admin_info.php"><?php echo $row['admin_name'];
                ?></a>
                <button style="background:red;"> <a href="admin_logout.php">logout</a></button>
            </div>

        </div>
    </div>
    <?php 
        }else{
            header('location:../index.php')
    ?>

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
        </label>
        <button type="submit" name="button" value="search" style="background-color:grey">Search</button>
    </form>

    <h2 style="text-align:center;">list of rooms</h2>

    <?php
        if (isset($_POST['search'])) {
            $que=mysqli_query($connection,"SELECT * FROM rooms left join account on rooms.number=account.number WHERE room_location like '%$_POST[search]%' ");

                    if(mysqli_num_rows($que)==0)
                    {
                        echo "sorry! NO rooms at that area.";
                    }
                    else{
    ?>
        <table text-align="center" boarder="1" width="100%" style="margin-left:auto; margin-right:auto;">
                        <tr style="background-color:grey;">
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
<th>delete</th>
</tr>

    <?php
$db=mysqli_connect('localhost','root','', 'users');

  //getting all the required values
if($db){
      $query="SELECT * FROM rooms left join account on rooms.number=account.number" ;
      $result=mysqli_query($db,$query);
       while ($row=mysqli_fetch_assoc($result))
{
?>
<tr text-align="center" style="background-color:lightblue;">
<td><p style="font-size:15px;"><?php echo $row['roomid']; ?></p></td>
<td><p><?php echo $row['name']; ?></p></td>
<td><p><?php echo $row['location']; ?></p></td>
<td><p><?php echo $row['price']; ?></p></td>
<td><p><?php echo $row['totalrooms']; ?></p></td>
<td><p><?php echo $row['number']; ?></p></td>
<td><p><?php echo $row['tenure']; ?></p></td>
<td><p><?php echo $row['detail']; ?></p></td>
<td><p><?php echo "<img src='".$row['image']."' height='100' width='100'/>" ?></p></td>
 <td><form action="" method="POST" >
        <label>
            <input type="number" name="id" placeholder="enter room id" required></input>
        </label>
<button type="submit" name="delete" value="delete" style="background-color:red;">Delete Add</button></form></td>
</tr>
  <?php
}

    if(isset($_POST['delete']))
    {
        $querry="DELETE FROM rooms where roomid='$_POST[id]'";
    if(mysqli_query($connection,$querry)){
        ?>
            <script type="text/javascript">
                alert("Deleted successfull!");
            </script>
  <?php
    }else{
        ?>
         <script type="text/javascript">
                alert("Eror");
            </script>
<?php
}
}
}
}
?> 
</div>  
</div>  
    <div class="footer">
    <span class="copyright">© All right reserved by Rajan and Ashish.</span>
    </div>  

</body>
</html>