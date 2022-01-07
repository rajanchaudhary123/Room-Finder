<?php
   

        $db=mysqli_connect('localhost','root','', 'users'); //connect to database

        //getting all the submitted values
       if(isset($_POST['upload'])){
        $location=$_POST['location'];
        $rooms=$_POST['rooms'];
        $number=$_POST['number'];
        $price=$_POST['price'];
        $tenure=$_POST['tenure'];
        $detail=$_POST['details'];
        $filename= $_FILES["images"]["name"];
        $tempname=$_FILES["images"]["tmp_name"];
        $folder="pics/".$filename;
        move_uploaded_file($tempname, $folder);
       

        $sql= "INSERT INTO rooms(roomid,room_location,number,totalrooms,price,tenure,detail,image) VALUES ('','$location','$number','$rooms','$price','$tenure','$detail','$folder')";

        if(mysqli_query($db,$sql)){
                 header('location:userinfo.php');
        }
}

?>

<!DOCTYPE html>
<html>
    <head><title>Create a new add</title>
        <link rel="stylesheet" type="text/css" href="css/addform.css">
</head>
<body style="background-color:#ced6cf">
    <div class="addform">
        <form action="" method="POST" enctype="multipart/form-data" >
            <h3 class="form-title">CREATE NEW ADD</h3>
            <div class="textbox">
                Upload photos:   <input type="file"  name="images" multiple required>
            </div>
            <div class="textbox">
                Location:    <input type="text" name="location" required>
            </div>
            <div class="textbox">
                Mobile number:    <input type="text" name="number" required>
            </div>
            <div class="textbox">
                No. of rooms:    <input type="number" name="rooms" required>
            </div>
            <div class="textbox">
                Total price per month:   <input type="number" name="price" required>
            </div>
            <div class="textbox">
                Tenure(In months):    <input type="number" name="tenure" >
            </div>
            <div class="textbox">
                Detail about room:   <textarea rows="6" cols="10" name="details"></textarea>
            </div>
            <button type="submit" name="upload" class="button" value="submit">submit</button>
        </form>

    </div>
</body>
</html>
