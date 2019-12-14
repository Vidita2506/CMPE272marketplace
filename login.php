<?php
	session_start();

        ob_start();
	if(isset($_SESSION['login_success'])){
		header("Location: index.php");
	}

	$servername = "sidharthjayaprakash9360963.ipagemysql.com";
	$username = "jsidharth";
	$password = "root123";
	$dbname = "market_place_1";
	$conn = new mysqli($servername, $username, $password, $dbname);

	if(!$conn){
		die("Connection failed!!!!" .mysqli_connect_error());
	}

	if($_SERVER["REQUEST_METHOD"] == "POST"){
		$email = $_POST["email"];
		$password = $_POST["password"];
		$hash = sha1($password);
                $login = false;

		$sql = "SELECT * FROM users WHERE email='$email'";

		if($result = $conn->query($sql)){
			if(mysqli_num_rows($result) < 1 ){
				//ERROR OUT
				//echo "No such user";
                                echo '<script language="javascript">';
                                echo 'alert("No such user, please register first!")';
                                echo '</script>';
			}else{
				$row = mysqli_fetch_array($result);
				$pass = $row['Password'];
				if($pass == $hash){
					//Passwords match.
					setcookie('login_success', 'true');
					setcookie('email', $email);
					echo "Passwords match";
					$_SESSION['login_success'] = 'true';
					$_SESSION['email'] = $email;
					header("Location: index.php");
                                        $login = true;
				}else{
					//No match.
					//echo "Passwords do not match";
                                        echo '<script language="javascript">';
                                        echo 'alert("Password is incorrect!")';
                                        echo '</script>';
				}
			}
		}else{
			echo "The query did not execute correctly!";
		}
	}
	$conn->close();
?>

<!DOCTYPE html>
<html>
<head>
  <title>Registration system PHP and MySQL</title>
  <link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
  <div class="header">
  	<h2>Login</h2>
  </div>
	 
  <form method="post" action="login.php">
  	<div class="input-group">
  		<label>Email</label>
  		<input type="text" name="email" id="email">
  	</div>
  	<div class="input-group">
  		<label>Password</label>
  		<input type="password" name="password">
  	</div>
  	<div class="input-group">
  		<button type="submit" class="btn" name="login_user">Login</button>
  	</div>
  	<p>
  		Not yet a member? <a href="register.php">Sign up</a>
  	</p>
  </form>
</body>
</html>