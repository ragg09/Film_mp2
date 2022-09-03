<!DOCTYPE html>

<?php


include("config2.php");
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
$queryproducer = mysqli_query($mysqli, "SELECT * FROM producers");
$querygenres = mysqli_query($mysqli, "SELECT * FROM filmgenres");
$queryroletypes = mysqli_query($mysqli, "SELECT * FROM roletypes");

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

	<form action="movie.php" method="post" name="form1">
         <center>
         	 <h1>Add New Movie</h1>
         	 <br>

         	 <h4>PRODUCER</h4>
         	 <h3>Select Producer</h3>
         	 <select selected="selected" name="ProducerID">
				<?php while($row = mysqli_fetch_array($queryproducer)):;?>
					<option><?php echo $row['ProducerID'];?></option>
				<?php endwhile;?>
			   </select>

			<hr width="30%">
         	 <br>
         	 <h4>CERTIFICATE</h4>
         	 <h3>Certificate</h3>
	       	 <input type="text" name="Certificate">

	       	 <hr width="30%">
         	 <br>
         	 <h4>GENRE</h4>
         	 <h3>Select Genre</h3>
         	 <select selected="selected" name="GenreID">
   				<?php while($row = mysqli_fetch_array($querygenres)):;?>
   					<option><?php echo $row['GenreID'];?></option>
   				<?php endwhile;?>
			   </select>

			<hr width="30%">
         	 <br>
         	 <h4>FILM TITLE</h4>
         	 <h3>Title</h3>
         	 <input type="text" name="FilmTitle">
         	 <h3>Story</h3>
         	 <input type="text" name="FilmStory">
         	 <h3>Release Date</h3>
         	 <input type="text" name="FilmReleaseDate" placeholder="yyyy-mm-dd">
         	 <h3>Duration</h3>
         	 <input type="text" name="FilmDuration">
         	 <h3>AdditionalInfo</h3>
         	 <input type="text" name="FilmAdditionalInfo">

         	 <hr width="30%">
         	 <br>
         	 <h4>ACTORS</h4>
         	 <h3>Full Name</h3>
         	 <input type="text" name="ActorFullName">
         	 <h3>Notes</h3>
         	 <input type="text" name="ActorNotes">

         	 <hr width="30%">
         	 <br>
         	 <h4>ROLE TYPE</h4>
         	 <h3>Select Role</h3>
         	 <select selected="selected" name="RoleTypeID">
				<?php while($row = mysqli_fetch_array($queryroletypes)):;?>
					<option><?php echo $row['RoleTypeID'];?></option>
				<?php endwhile;?>
			</select>

	       	<hr width="30%">
         	<br>
         	<h4>FILM ACTOR ROLES</h4>
         	<h3>Character Name</h3>
         	<input type="text" name="CharacterName">
         	<h3>Character Description</h3>
         	<input type="text" name="CharacterDescription">


	         <br> <br> <br> 

	         <input type="submit" name="Submit" value="ADD MOVIE!">


	         <br> <br><br> <br><br> <br>
         </center>
       
    </form>

</body>
</html>

