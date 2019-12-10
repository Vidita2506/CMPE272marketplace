<?php
	$servername = "sidharthjayaprakash9360963.ipagemysql.com";
	$username = "jsidharth";
	$password = "root123";
	$dbname = "market_place_1";
	$conn = new mysqli($servername, $username, $password, $dbname);
	
	if(!$conn){
		die("Connection failed!!!!" .mysqli_connect_error());
	}

	if($_SERVER["REQUEST_METHOD"] == "POST"){
		$firstname = $_POST["firstname"];
		$lastname = $_POST["lastname"];
		$password = $_POST["password"];
		$email = $_POST["email"];
		$homeAddress = $_POST["address"];
		$homePhone = $_POST["homephone"];
		$cellPhone = $_POST["cellphone"];
		$hash = sha1($password);
	
		$sql = "INSERT INTO users (FirstName, LastName, Email, Password, HomeAddress
		,HomePhone, CellPhone) VALUES ('$firstname', '$lastname', '$email' , '$hash' ,'$homeAddress', '$homePhone', '$cellPhone')";
		if ($conn->query($sql) === TRUE) {
			echo "New record created successfully";
		} else {
			echo "Error: " . $sql . "<br>" . $conn->error;
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
  	<h2>Register</h2>
  </div>
	
  <form method="post" action="register.php">
      <div class="input-group">
  	  <label>First Name</label>
  	  <input type="text" name="firstname" placeholder="first name">
      </div>
      <div class="input-group">
  	  <label>Last Name</label>
  	  <input type="text" name="lastname" placeholder="last name">
  	</div>
  	<div class="input-group">
  	  <label>Email</label>
  	  <input type="email" name="email" placeholder="email">
      </div>
      <div class="input-group">
  	  <label>Home Address</label>
  	  <input type="text" name="address" placeholder="address">
      </div>
      <div class="input-group">
  	  <label>Home Phone</label>
  	  <input type="text" name="homephone" placeholder="home phone">
      </div>
      <div class="input-group">
  	  <label>Cell Phone</label>
  	  <input type="text" name="cellphone" placeholder="cell phone">
      </div>
  	<div class="input-group">
  	  <label>Password</label>
  	  <input type="password" name="password">
  	</div>
  	<div class="input-group">
  	  <button type="submit" class="btn" name="reg_user">Register</button>
  	</div>
  	<p>
  		Already a member? <a href="login.php">Sign in</a>
  	</p>
  </form>
</body>
</html>