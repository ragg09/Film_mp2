<!DOCTYPE html>

<?php
session_start();
//including the database connection file
include("config.php");

$user = "guest";

//trapping
if($_SESSION['username'] == !"rene"){
    header("location:login.php");
}

if (isset($_SESSION['username']) && ! empty($_SESSION['username']))
{
	$user = $_SESSION['username'];
}

if (isset($_POST['searchbtn'])) 
{
	if(preg_match("/^[  a-zA-Z0-9-@.]+/", $_POST['search'])){ 
	   $search=$_POST['search']; 

		$resultactors = mysqli_query($mysqli, "SELECT * FROM actors WHERE  ActorFullName LIKE '%" . $search . "%' OR ActorNotes LIKE '%" .  $search . "%'"); 

	}

}

?>


<!-- ******************************************************** -->

<html>
<head>
	<title>MOVIE</title>
	<link href="../css_java/hide_nav.css" rel="stylesheet" type="text/css" />
	<link href="../css_java/newmain.css" rel="stylesheet" type="text/css" />
	<link href="datetimepicker.css" rel="stylesheet" type="text/css" />


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
		        while($res = mysqli_fetch_array($result)) {    
		            


		            echo "<tr>";
		            //
		            echo "<td>".$res['FilmTitle']."</td>";
		            echo "<td>".$res['FilmStory']."</td>";
		            echo "<td>".$res['FilmReleaseDate']."</td>";
		            echo "<td>".$res['FilmDuration']."</td>";
		            echo "<td>".$res['FilmAdditionalInfo']."</td>";     
		            echo "<td><a style=\"color: orange\" href=\"view.php?FilmTitleID=$res[FilmTitleID]\">VIEW</a></td>";  
		        }
		        ?>
		    </table>
	    </center>
	</div>

<!-- 	<div style="height: 100vh; width: 100%; border: 1px solid white;">

	</div> -->

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
	        }
	        ?>
	    	</table>
    	</center>
	</div>

	<div class="table3">
		<center>
			<h4>ACTOR ROLE TABLE</h4>
			<table border=1>
	        <tr>
	            <td>FilmTitleID</td>
	            <td>ActorID</td>
	            <td>RoleTypeID</td>
	            <td>CharacterName</td>
	            <td>CharacterDescription</td>
	        </tr>
	        <?php 
	        //while($res = mysql_fetch_array($result)) { // mysql_fetch_array is deprecated, we need to use mysqli_fetch_array 
	        while($res = mysqli_fetch_array($resultfilmactorroles)) {         
	            echo "<tr>";
	            echo "<td>".$res['FilmTitleID']."</td>";
	            echo "<td>".$res['ActorID']."</td>"; 
	            echo "<td>".$res['RoleTypeID']."</td>";
	            echo "<td>".$res['CharacterName']."</td>"; 
	            echo "<td>".$res['CharacterDescription']."</td>";
		        }
		        ?>
		    </table>
    	</center>
	</div>

	<div class="table4">
		<center>
			<h4>ACTOR TABLE</h4>
			<table border=1>
		        <tr>
		            <td>ActorFullName</td>
		            <td>ActorNotes</td>
		        </tr>
		        <?php 
		        //while($res = mysql_fetch_array($result)) { // mysql_fetch_array is deprecated, we need to use mysqli_fetch_array 
		        while($res = mysqli_fetch_array($resultactors)) {         
		            echo "<tr>";
		            echo "<td>".$res['ActorFullName']."</td>";
		            echo "<td>".$res['ActorNotes']."</td>"; 
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
		         }
		        ?>
		    </table>
    	</center>
	</div>

	<div class="table6">
		<center>
			<h4>CERTIFICATE TABLE</h4>
			<table border=1>
		        <tr>
		            <td>Certificate</td>
		        </tr>
		        <?php 
		        //while($res = mysql_fetch_array($result)) { // mysql_fetch_array is deprecated, we need to use mysqli_fetch_array 
		        while($res = mysqli_fetch_array($resultfilmcertificates)) {         
		            echo "<tr>";
		            echo "<td>".$res['Certificate']."</td>";  
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
		        }
		        ?>
		    </table>
    	</center>
	</div>

	<div class="table8">
		<center>
			<h4>PRODUCER/TITLE TABLE</h4>
			<table border=1>
		        <tr>
	            <td>ProducerID</td>
	            <td>FilmTitleID</td>
		        </tr>
		        <?php 
		        //while($res = mysql_fetch_array($result)) { // mysql_fetch_array is deprecated, we need to use mysqli_fetch_array 
		        while($res = mysqli_fetch_array($resultfilmtitlesproducers)) {         
		            echo "<tr>";
		            echo "<td>".$res['ProducerID']."</td>";
		            echo "<td>".$res['FilmTitleID']."</td>";
     
		        }
		        ?>
		    </table>
    	</center>
	</div>


<!--<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>--> <!-- this is the direct link for hiding nav -->
	<script src="../css_java/hide_nav1.js"> </script> <!-- this is the actual code for hiding nav -->
	<script src="../css_java/hide_nav.js"> </script>	
</body>
</html>

