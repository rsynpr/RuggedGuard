<!DOCTYPE html>
<html>
<head>
	<title>RuggedGuard</title>
    <link rel="icon" href="RsyaWhite.png">
	<link rel="stylesheet" type="text/css" href="style.css">
	<link href="https://fonts.googleapis.com/css?family=Poppins:600&display=swap" rel="stylesheet">
	<script src="https://kit.fontawesome.com/a81368914c.js"></script>
	<meta name="viewport" content="width=device-width, initial-scale=1">
</head>
<body>
	<div class="container">
		<div class="img">
			<img src="phone.svg">
		</div>
		<div class="login-content">
			<form action="proses_login.php" method="post">
				<img src="RsyaWhite.png">
				<h2 class="title">RuggedGuard</h2>
           		<div class="input-div one">
           		   <div class="i">
           		   		<i class="fas fa-user"></i>
           		   </div>
           		   <div class="div">
                         <input type="text" id="username" name="username" autocomplete="off" required placeholder="Username">

           		   </div>
           		</div>
           		<div class="input-div pass">
           		   <div class="i"> 
           		    	<i class="fas fa-lock"></i>
           		   </div>
           		   <div class="div">
                           <input type="password" id="password" name="password" required placeholder="Password">

            	   </div>
            	</div>
            	<a href="#">Forgot Password?</a>
            	<input type="submit" class="btn" value="Login">
            </form>
        </div>
    </div>
    <script type="text/javascript" src="main.js"></script>
</body>
</html>
