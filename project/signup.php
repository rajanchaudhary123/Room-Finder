
<!DOCTYPE html>
<html>
<head>
    <title>Sign up</title>
    <link rel="stylesheet" type="text/css" href="css/style.css">
    <link rel="stylesheet" type="text/css" href="css/signup.css">
</head> 

<body>
<div class="navbar">
            <div class="logo">  Mero Ghar</div>
            <div class="info">
            <div class="search">
                    <form method="" action="rooms.php" enctype="multipart/form-data">
                        <input type="submit" name="search" value="All Rooms"/>  
                    </form>
                </div>
                <a href="index.php" class=home>Home</a>
                <a href="contactus.php" class="about">Contact us</a>
            </div>
        </div>
    <form action="registration.php" method="POST">
        <div class="signupform">
            <h1>Signup</h1>
            <div class="textbox">
                <input type="text" placeholder="Full name" name="name" value="" required>
            </div>
            <div class="textbox">
                <input type="text" placeholder="location" name="location" value="" required>
            </div>
            <div class="textbox">
                <input type="text" placeholder="mobile number" name="phone" value="" required>
            </div>
            <div class="textbox">
                <input type="email" placeholder="email" name="email" value=""required>
            </div>    
            <div class="textbox">
                <input type="password" placeholder="password" name="pass1" value="" required>
            </div>
            <div class="textbox">
                <input type="password" placeholder="re-enter password" name="pass2" value="" required>
            </div>
                <input type="submit" class="btn" value="Signup">
            <p>Already have an account? <a href="login.php">Log In</a></p>    
        </div>
</form>
</body>
</html>    