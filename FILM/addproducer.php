<!DOCTYPE html>

<?php


include("config.php");
session_start();
$user = "guest";

//trapping
if($_SESSION['username'] == !"rene"){
    header("location:login.php");
}

if (isset($_SESSION['username']) && ! empty($_SESSION['username']))
{
	$user = $_SESSION['username'];
}
?>

<html>
<head>
	<title>MOVIE|| ADD RoleType</title>
	<link href="../css_java/hide_nav.css" rel="stylesheet" type="text/css" />
	<link href="../css_java/mycss.css" rel="stylesheet" type="text/css">
</head>

<body>
	<?php
	include('nav.php');
	?>

	<form action="producer.php" method="post" name="form1">
         <center>
         	 <h1>Add New Produer</h1>
         	 <br>
         	 <h3>Name</h3>
	       	 <input type="text" name="ProducerName">
	       	 <br>
         	 <h3>ContactEmail</h3>
	       	 <input type="text" name="ContactEmailAddress">
	       	 <br>
         	 <h3>Website</h3>
	       	 <input type="text" name="Website">

	         <br> <br>
	         <input type="submit" name="Submit" value="Add">
         </center>
       
    </form>

</body>
</html>

