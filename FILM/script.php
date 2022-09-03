<?php
session_start();

if (isset($_POST['submit'])) 
{
	include("config2.php");
	
	if ($_POST['username'] == $databaseUsername && $_POST['password'] == $databasePassword){
	$_SESSION['username'] = 'rene';

	header('location: home.php');
	}
	else{
	header('location: login.php');
	include("config.php");
	}

}

if (isset($_POST['submit_logout'])) 
{
	session_destroy();
	$_SESSION['username'] = 'guest';
	header('location: home.php');
}

// if (isset($_POST['submit']) && !empty($_POST['username'])) {
// 	 if ($_POST['username'] == 'rene') {
//      $_SESSION['username'] = 'rene';
// 	header('location: index.php');
// }
// }

?>
