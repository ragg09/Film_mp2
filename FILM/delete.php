<!DOCTYPE html>

<?php
//including the database connection file
include("config.php");
session_start();

//trapping
if($_SESSION['username'] == !"rene"){
    header("location:login.php");
}

$user = "guest";

if (isset($_SESSION['username']) && ! empty($_SESSION['username']))
{
	$user = $_SESSION['username'];
}
include("select.php")
?>


<!-- ******************************************************** -->

<html>
<head>
	<title>MOVIE</title>
	<link href="../css_java/hide_nav.css" rel="stylesheet" type="text/css" />
	<link href="../css_java/mycss.css" rel="stylesheet" type="text/css">
</head>

<body>
	<?php
	include('nav.php');
	?>
	
	<div  class="table1">
		<center>
			<h4>FILM TITLES TABLE</h4>
			<table border=1>
		        <tr>
		            
		            <td>FilmTitle</td>
		            <td>FilmStory</td>
		            <td>FilmReleaseDate</td>
		            <td>FilmDuration</td>
		            <td>FilmAdditionalInfo</td>
		        </tr>
		        <?php 
		        //while($res = mysql_fetch_array($result)) { // mysql_fetch_array is deprecated, we need to use mysqli_fetch_array 
		        while($res = mysqli_fetch_array($resultfilmtitles)) {    
		            


		            echo "<tr>";
		            //
		            echo "<td>".$res['FilmTitle']."</td>";
		            echo "<td>".$res['FilmStory']."</td>";
		            echo "<td>".$res['FilmReleaseDate']."</td>";
		            echo "<td>".$res['FilmDuration']."</td>";
		            echo "<td>".$res['FilmAdditionalInfo']."</td>";
		            echo "<td><a style=\"color: orange\" href=\"del2.php?FilmTitleID=$res[FilmTitleID]\" onClick=\"return confirm('Are you sure you want to delete?')\">Delete</a></td>";      
		        }
		        ?>
		    </table>
	    </center>
	</div>

	<div class="table2">
		<center>
			<h4>GENRE TABLE</h4>
			<table border=1>
	        <tr>
	            <td>Genre</td>
	        </tr>
	        <?php 
	        //while($res = mysql_fetch_array($result)) { // mysql_fetch_array is deprecated, we need to use mysqli_fetch_array 
	        while($res = mysqli_fetch_array($resultfilmgenres)) {         
	            echo "<tr>";
            echo "<td>".$res['Genre']."</td>";
            echo "<td><a style=\"color: orange\" href=\"del.php?GenreID=$res[GenreID]\" onClick=\"return confirm('Are you sure you want to delete?')\">Delete</a></td>"; 
	        }
	        ?>
	    	</table>
    	</center>
	</div>

	<div class="table5">
		<center>
			<h4>ROLE TYPES TABLE</h4>
			<table border=1>
		        <tr>
		            <td>RoleType</td>
		        </tr>
		        <?php 
		        //while($res = mysql_fetch_array($result)) { // mysql_fetch_array is deprecated, we need to use mysqli_fetch_array 
		        while($res = mysqli_fetch_array($resultroletypes)) {         
		            echo "<tr>";
		            echo "<td>".$res['RoleType']."</td>";
		            echo "<td><a style=\"color: orange\" href=\"del.php?RoleTypeID=$res[RoleTypeID]\" onClick=\"return confirm('Are you sure you want to delete?')\">Delete</a></td>"; 
		         }
		        ?>
		    </table>
    	</center>
	</div>


	<div class="table7">
		<center>
			<h4>PRODUCER TABLE</h4>
			<table border=1>
		        <tr>
	            <td>ProducerName</td>
	            <td>ContactEmailAddress</td>
	            <td>Website</td>
		        </tr>
		        <?php 
		        //while($res = mysql_fetch_array($result)) { // mysql_fetch_array is deprecated, we need to use mysqli_fetch_array 
		        while($res = mysqli_fetch_array($resultproducers)) {         
		            echo "<tr>";
		            echo "<td>".$res['ProducerName']."</td>";
		            echo "<td>".$res['ContactEmailAddress']."</td>";
		            echo "<td>".$res['Website']."</td>";
		            echo "<td><a style=\"color: orange\" href=\"del.php?ProducerID=$res[ProducerID]\" onClick=\"return confirm('Are you sure you want to delete?')\">Delete</a></td>";       
		        }
		        ?>
		    </table>
    	</center>
	</div>

	<br><br><br>

<!--<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>--> <!-- this is the direct link for hiding nav -->
	<script src="../css_java/hide_nav1.js"> </script> <!-- this is the actual code for hiding nav -->
	<script src="../css_java/hide_nav.js"> </script>	
</body>
</html>

