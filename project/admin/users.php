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
                    if(isset($_SESSION['admin_email']))

                    {
                        $connection = mysqli_connect('localhost','root','','users');
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
 <table text-align="center" boarder="1" width="100%" style="margin-left:auto; margin-right:auto;">
<tr style="background-color:grey;">
<th>person name</th>    
<th>location</th>
<th>phone</th>
<th>email</th>
<th>delete</th>

</tr>

    <?php
$db=mysqli_connect('localhost','root','', 'users');

  //getting all the required values
if($db){
      $query="SELECT * FROM account" ;
      $result=mysqli_query($db,$query);
       while ($row=mysqli_fetch_assoc($result))
{
?>
<tr text-align="center" style="background-color:lightblue;">
<td><p><?php echo $row['name']; ?></p></td>
<td><p><?php echo $row['location']; ?></p></td>
<td><p><?php echo $row['number']; ?></p></td>
<td><p><?php echo $row['email']; ?></p></td>
<td><form action="" method="POST">
    <label>
            <input type="text" name="email" placeholder="enter user email" required></input>
        </label>
    <button type="submit" name="delete" value="delete" style="background-color:red;">Delete User</button></form></td>
</tr>
  <?php
}
    if(isset($_POST['delete']))
    {
        $querry="DELETE FROM account where email='$_POST[email]'";
    if(mysqli_query($connection,$querry)){
        ?>
            <script type="text/javascript">
                alert("Delete user successfull!");
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
?> 
</div>  
</div>  
    <div class="footer">
    <span class="copyright">© All right reserved by Rajan and Ashish.</span>
    </div>  

</body>
</html>