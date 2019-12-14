<?php
    session_start();
    require_once 'src/Facebook/autoload.php';
	$fb = new Facebook\Facebook([
		'app_id' => '482620352387135', // Replace {app-id} with your app id
		'app_secret' => 'bf2828ce3eeec15a2b702d504d7c3c95',
		'default_graph_version' => 'v3.2',
	]);

	$helper = $fb->getRedirectLoginHelper();

	$permissions = ['email']; // Optional permissions
	$loginUrl = $helper->getLoginUrl('https://http://www.jsidharth.com/marketplace/fb-callback.php', $permissions);

	echo '<a href="' . htmlspecialchars($loginUrl) . '">Log in with Facebook!</a>';
?>