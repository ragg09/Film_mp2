<!DOCTYPE html>

<?php
//including the database connection file


session_start();

 if(session_id() != ""){
 	include("config.php");
 	$user = "guest";
 }
 
if (isset($_SESSION['username']) && ! empty($_SESSION['username']))
{
	$user = $_SESSION['username'];
}

?>

<html>
<head>
	<title>MOVIE</title>
	<link href="../css_java/hide_nav.css" rel="stylesheet" type="text/css" />
	<link href="../css_java/sliding.css" rel="stylesheet" type="text/css">
	<link href="../css_java/home.css" rel="stylesheet" type="text/css">
	<style>
body {font-family: Arial, Helvetica, sans-serif;}
* {box-sizing: border-box;}

/* Button used to open the contact form - fixed at the bottom of the page */
.open-button {
  background-color: black;
  color: white;
  font-size: 20px;
  border: none;
  cursor: pointer;
  opacity: 0.8;
  position: fixed;
  width: 87px;
  margin-top: 5px;
}

/* The popup form - hidden by default */
.form-popup {
  display: none;
  position: fixed;
  top: 50px;
  right: 0;
  border: 3px solid #f1f1f1;
  z-index: 9;
}

/* Add styles to the form container */
.form-container {
  max-width: 300px;
  padding: 10px;
}

/* Full-width input fields */
.form-container input[type=text], .form-container input[type=password] {
  width: 100%;
  padding: 15px;
  margin: 5px 0 22px 0;
  border: none;
  background: #f1f1f1;
}

/* When the inputs get focus, do something */
.form-container input[type=text]:focus, .form-container input[type=password]:focus {
  background-color: #ddd;
  outline: none;
}

/* Set a style for the submit/login button */
.form-container .btn {
  background-color: #4CAF50;
  color: white;
  padding: 16px 20px;
  border: none;
  cursor: pointer;
  width: 100%;
  margin-bottom:10px;
  opacity: 0.8;
}

/* Add a red background color to the cancel button */
.form-container .cancel {
  background-color: red;
}

/* Add some hover effects to buttons */
.form-container .btn:hover, .open-button:hover {
  opacity: 1;
}
</style>
</head>

<body>
	<?php
		include('nav.php');
	?>

<div class="form-popup" id="myForm">
  <form action="script.php" class="form-container" method="post">
    <h1>Login</h1>

    <label for="username"><b>Username</b></label>
    <input type="text" placeholder="Enter Username" name="username" required>

    <label for="password"><b>Password</b></label>
    <input type="password" placeholder="Enter Password" name="password" required>

    <button type="submit" name="submit" class="btn">Login</button> 
    <button type="submit" class="btn cancel" onclick="closeForm()">Close</button>
  </form>
</div>

	<div class="sliding">
		<div class="slidy">
			<figure>
				<div>
					<img src="../images/slidy1.png">
				</div>
				
				<div>
					<img src="../images/slidy2.png">
				</div>
				
				<div>
					<img src="../images/slidy3.png">
				</div>
				
				<div>
					<img src="../images/slidy4.png">
				</div>
				
				<div>
					<img src="../images/slidy5.jpg">
				</div>
			</figure>
		</div>
	</div>	

	<center>
	
	<div style="margin-top: 250px;">
		<hr width="2%" color="#b2474c">
		<hr width="5%" color="#bf4c40">
		<hr width="10%" color="#cc5233">
		<hr width="15%" color="#d95726">
		<hr width="20%" color="#e65c1a">
		<hr width="25%" color="#f2610d">
		<hr width="30%" color="#ff6600">
			<h1 style="color: orange">WELCOME</h1>
			<h1 style="color: orange">TO MY</h1>
			<h1 style="color: orange">MOVIE</h1>
			<h1 style="color: orange">DATABASE</h1>
			<h1 style="color: orange">WEBSITE</h1>
		<hr width="30%" color="#ff6600">
		<hr width="25%" color="#f2610d">
		<hr width="20%" color="#e65c1a">
		<hr width="15%" color="#d95726">
		<hr width="10%" color="#cc5233">
		<hr width="5%" color="#bf4c40">
		<hr width="2%" color="#b2474c"> 

	</div>
	</center>

</body>
</html>

