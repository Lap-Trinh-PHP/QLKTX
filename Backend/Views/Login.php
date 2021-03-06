<!DOCTYPE html>
<html>
<head>
	<title>HaUI</title>
	<link rel="stylesheet" type="text/css" href="../Assets/Backend/css/stylelog.css">
	<link href="https://fonts.googleapis.com/css?family=Poppins:600&display=swap" rel="stylesheet">
	<script src="https://kit.fontawesome.com/a81368914c.js"></script>
	<meta name="viewport" content="width=device-width, initial-scale=1">
</head>
<?php
    $username = isset($_POST["username"]) ? $_POST["username"] : null;
    $password = isset($_POST["password"]) ? $_POST["password"] : null;
    $sql = "SELECT * FROM user WHERE userName = '".$username."'";
    $result = mysqli_query($conn, $sql);
    $row = mysqli_fetch_assoc($result);
    if(isset($row["password"]) && $row["password"] == md5($password)){
        $_SESSION["username"] = $username;
        header("location:index.php");
    }
?>
<body>
	<img class="wave" src="../Assets/Backend/images/wave.png">
	<div class="container">
		<div class="img">
			<img style="margin-top:250px;" src="../Assets/Backend/images/bg.svg">
		</div>
		<div class="login-content" style="position:absolute;right:250px;top:200px;">
			<form method="post">
				<img src="../Assets/Backend/images/avatar.svg">
				<h2 class="title">Welcome</h2>
           		<div class="input-div one">
           		   <div class="i">
           		   		<i class="fas fa-user"></i>
           		   </div>
           		   <div class="div">
           		   		<input type="text" name="username" class="input" placeholder="Username">
           		   </div>
           		</div>
           		<div class="input-div pass">
           		   <div class="i"> 
           		    	<i class="fas fa-lock"></i>
           		   </div>
           		   <div class="div">
           		    	<input type="password" name="password" class="input" placeholder="Password">
            	   </div>
            	</div>
            	<a href="#">Forgot Password?</a>
            	<input type="submit" class="btn" value="Login">
            </form>
        </div>
    </div>
    <script type="text/javascript" src="../Assets/Backend/js/main.js"></script>
</body>
</html>
