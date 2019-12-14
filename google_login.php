<?php
session_start();
ob_start();
if (isset($_SESSION['login_success'])) {
    header("Location: index.php");
}

$servername = "sidharthjayaprakash9360963.ipagemysql.com";
$username = "jsidharth";
$password = "root123";
$dbname = "market_place_1";
$conn = new mysqli($servername, $username, $password, $dbname);

if (!$conn) {
    die("Connection failed!!!!" . mysqli_connect_error());
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST["email"];
    $password = $_POST["password"];
    $hash = sha1($password);
    $login = false;

    $sql = "SELECT * FROM users WHERE email='$email'";

    if ($result = $conn->query($sql)) {
        if (mysqli_num_rows($result) < 1) {
            //ERROR OUT
            //echo "No such user";
            echo '<script language="javascript">';
            echo 'alert("No such user, please register first!")';
            echo '</script>';
        } else {
            $row = mysqli_fetch_array($result);
            $pass = $row['Password'];
            if ($pass == $hash) {
                //Passwords match.
                setcookie('login_success', 'true');
                setcookie('email', $email);
                echo "Passwords match";
                $_SESSION['login_success'] = 'true';
                $_SESSION['email'] = $email;
                header("Location: index.php");
                $login = true;
            } else {
                //No match.
                //echo "Passwords do not match";
                echo '<script language="javascript">';
                echo 'alert("Password is incorrect!")';
                echo '</script>';
            }
        }
    } else {
        echo "The query did not execute correctly!";
    }
}
$conn->close();
?>

<!DOCTYPE html>
<html>
<head>
  <title>Registration system PHP and MySQL</title>
  <!-- <link rel="stylesheet" type="text/css" href="style.css"> -->
  <meta name="google-signin-client_id" content="596990269933-mltmdf1a9dag6uvi78q0se28e74dk2sv.apps.googleusercontent.com">
  <script>
// Render Google Sign-in button
function renderButton() {
    gapi.signin2.render('gSignIn', {
        'scope': 'profile email',
        'width': 240,
        'height': 50,
        'longtitle': true,
        'theme': 'dark',
        'onsuccess': onSuccess,
        'onfailure': onFailure
    });
}

function saveUserData(userData){
    $.post('userData.php', { oauth_provider:'google', userData: JSON.stringify(userData) });
}

// Sign-in success callback
function onSuccess(googleUser) {
    // Get the Google profile data (basic)
    //var profile = googleUser.getBasicProfile();
    
    // Retrieve the Google account data
    gapi.client.load('oauth2', 'v2', function () {
        var request = gapi.client.oauth2.userinfo.get({
            'userId': 'me'
        });
        request.execute(function (resp) {
            // Display the user details
            var profileHTML = '<h3>Welcome '+resp.given_name+'! <a href="javascript:void(0);" onclick="signOut();">Sign out</a></h3>';
            profileHTML += '<img src="'+resp.picture+'"/><p><b>Google ID: </b>'+resp.id+'</p><p><b>Name: </b>'+resp.name+'</p><p><b>Email: </b>'+resp.email+'</p><p><b>Gender: </b>'+resp.gender+'</p><p><b>Locale: </b>'+resp.locale+'</p><p><b>Google Profile:</b> <a target="_blank" href="'+resp.link+'">click to view profile</a></p>';
            document.getElementsByClassName("userContent")[0].innerHTML = profileHTML;
            
            document.getElementById("gSignIn").style.display = "none";
            document.getElementsByClassName("userContent")[0].style.display = "block";
            
            // Save user data
            saveUserData(resp);
        });
    });
}

// Sign-in failure callback
function onFailure(error) {
    alert(error);
}

// Sign out the user
function signOut() {
    var auth2 = gapi.auth2.getAuthInstance();
    auth2.signOut().then(function () {
        document.getElementsByClassName("userContent")[0].innerHTML = '';
        document.getElementsByClassName("userContent")[0].style.display = "none";
        document.getElementById("gSignIn").style.display = "block";
    });

    auth2.disconnect();
}

</script>
<script> src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script src="https://apis.google.com/js/client:platform.js?onload=renderButton" async defer></script>
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
	<div id="gSignIn"></div>
  	<p>
  		Not yet a member? <a href="register.php">Sign up</a>
  	</p>
  </form>
</body>
</html>
