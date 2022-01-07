<?php
session_start();
?>

<!DOCTYPE html>
<html>
<head>
    <title>profile</title>
    <link rel="stylesheet" type="text/css" href="css/style.css">
    <link rel="stylesheet" type="text/css" href="css/user.css">
    <link rel="stylesheet" type="text/css" href="css/room.css">
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
table,th,td
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
            </div>

        </div>
    </div>

                <div class="middle">
                    <div class="middle-text">

                        <h2 style="text-align:center;">My Profile</h2>
                        <div style="text-align: center;">Welcome!</div>
                            <h3 style="text-align:center;"><?php echo $row['name']; ?></h3>
                            <form action="edit.php" method="POST">
                                <button type="submit" class="edit"  name="submit1" style="float:right;">edit</button>
                            </form>
                            <?php
                                if(isset($_POST['submit1']))
                                {
                            ?>
                                    <script type="text/javascript">
                                        window.location="edit.php"
                                    </script>
                            <?php 
                                } 
                                echo "<div style='text-align:center;'><img src='".$row['pic']."' height='100' width='150'/></div>";
                            ?>

                            <div class="userinfo" style="text-align:center;">
                                <table text-align="center" width="50%" style="margin-left:auto; margin-right:auto; background-color: grey;">
                                    <tr>
                                        <th>Name: </th>
                                        <td><?php echo $row['name']; ?></td>
                                    </tr>
                                    <tr>
                                        <th>Location: </th>
                                        <td><?php echo $row['location']; ?></td>
                                    </tr>
                                    <tr>
                                        <th>Contact number: </th>
                                        <td><?php echo $row['number']; ?></td>
                                    </tr>
                                    <tr>
                                        <th>Email: </th>
                                        <td><?php echo $row['email']; ?></td>
                                    </tr>
                                    
                                </table>

                        </div>

            <h2 style="text-align:center; color:green;">My adds/Rooms</h2>
            <div class="rooms">
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
                        <th>delete</th>
                    </tr>
                    <?php
                    if($connection){
                            $result=mysqli_query($connection,"SELECT * FROM account LEFT JOIN rooms ON account.number=rooms.number where email='$_SESSION[email]';");
                            while($data=mysqli_fetch_assoc($result))
                            {
                    ?>
                        <tr text-align="center" style="background-color:lightblue;">
                            <td><p style="font-size:15px;"><?php echo $data['roomid']; ?></p></td>
                            <td><p style="font-size:15px;"><?php echo $data['name']; ?></p></td>
                            <td><p style="font-size:15px;"><?php echo $data['location']; ?></p></td>
                            <td><p style="font-size:15px;"><?php echo $data['price']; ?></p></td>
                            <td><p style="font-size:15px;"><?php echo $data['totalrooms']; ?></p></td>
                            <td><p style="font-size:15px;"><?php echo $data['number']; ?></p></td>
                            <td><p style="font-size:15px;"><?php echo $data['tenure']; ?></p></td>
                            <td><p style="font-size:15px;"><?php echo $data['detail']; ?></p></td>
                            <td><p style="font-size:15px;"><?php echo "<img src='".$data['image']."' height='100' width='100'/>" ?></p></td>
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