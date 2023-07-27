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
    .edit{
    float: left;
    border: none;
  border-radius: 50px;
  background-color: green;
  padding: 10px 15px;
  font-size: 15px;
  cursor: pointer;
    }
    .edit:hover{
        cursor: pointer;
        background-color: black;
        color: white;
    }
table,th.td
{
 padding:2px;
 border-collapse:collapse;
 font-family:Georgia, "Times New Roman", Times, serif;
 border:solid #ddd 2px;
 font-size:20px;
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

                    <a href="users.php" class=home>Registered users</a>
                    <a href="admin_rooms.php" class=home>Registered rooms</a>
                        <a href="admin_info.php"><?php echo $row['admin_name'];?></a>
                        <button style="background:red;"> <a href="admin_logout.php">logout</a></button>
            </div>

        </div>
    </div>

                <div class="middle">
                    <div class="middle-text">

                        <h2 style="text-align:center;">My Profile</h2>
                        <div style="text-align: center;">Welcome!</div>
                            <h3 style="text-align:center;"><?php echo $row['admin_name']; ?>[Admin]</h3>
                            <form action="admin_edit.php" method="POST">
                                <button type="submit" class="edit" style="float:right;" name="submit1">edit</button>
                            </form>
                            <?php
                                if(isset($_POST['submit1']))
                                {
                            ?>
                                    <script type="text/javascript">
                                        window.location="admin_edit.php"
                                    </script>
                            <?php 
                                } 
                            
                                echo "<div style='text-align:center;'><img height='200' width='200' src='images/".$row['admin_image']."'></div>";
                                ?>
                            <div class="userinfo" style="text-align:center;">
                                <table text-align="center" width="50%" style="margin-left:auto; margin-right:auto; background-color: grey;">
                                    <tr>
                                        <th>Name: </th>
                                        <td><?php echo $row['admin_name']; ?></td>
                                    </tr>
                                        <tr>
                                        <th>Contact number: </th>
                                        <td><?php echo $row['number']; ?></td>
                                    </tr>
                                        <tr>
                                        <th>Email: </th>
                                        <td><?php echo $row['admin_email']; ?></td>
                                    </tr>
                                    <tr>
                                        <th>College: </th>
                                        <td><?php echo $row['college']; ?></tr>
                                    </tr>
                                        <tr>
                                        <th>City: </th>
                                        <td><?php echo $row['city']; ?></td>
                                    </tr>         
                                        <tr>
                                        <th>Country: </th>
                                        <td><?php echo $row['country']; ?></td>
                                    </tr>


                                    
                                </table>

                        </div>

    <?php 
                    }
?>
</div>
</div>

<?php
    // if(isset($_POST['delete']))
    // {
    //     $delete=mysqli_query($connection,"DELETE * FROM account LEFT JOIN rooms ON account.number=rooms.number where roomid='".$_POST['roomid']."'");
    // } 

    ?>

    <div class="footer">
    <span class="copyright">© All right reserved by Rajan and Ashish.</span>
    </div>  

</body>
</html>