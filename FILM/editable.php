<!DOCTYPE html>

<?php
//including the database connection file
session_start();

//trapping
if($_SESSION['username'] == !"rene"){
    header("location:login.php");
}


 if(session_id() != ""){
 	include("config.php");
 	$user = "guest";
 }
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
	<link href="../css_java/mycss.css" rel="stylesheet" type="text/css" />
</head>

<body>
	<?php
	include('nav.php');
	?>
	
	<div  class="table1" id="tb1">
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
		            echo "<td><a style=\"color: orange\" href=\"editfilmtitles.php?FilmTitleID=$res[FilmTitleID]\">Edit</a></td>";

		        }
		        ?>
		    </table>
	    </center>
	</div>

	<div class="table2" id="tb2">
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

	            echo "<td><a style=\"color: orange\" href=\"editgenres.php?GenreID=$res[GenreID]\">Edit</a></td>";        
	        }
	        ?>
	    	</table>
    	</center>
	</div>

	<div class="table3" id="tb3">
		<center>
			<h4>ACTOR ROLE TABLE</h4>
			<table border=1>
	        <tr>
            <td>CharacterName</td>
            <td>CharacterDescription</td>
	        </tr>
	        <?php 
	        //while($res = mysql_fetch_array($result)) { // mysql_fetch_array is deprecated, we need to use mysqli_fetch_array 
	        while($res = mysqli_fetch_array($resultfilmactorroles)) {         
            echo "<tr>";
            
            echo "<td>".$res['CharacterName']."</td>"; 
            echo "<td>".$res['CharacterDescription']."</td>"; 

            echo "<td><a style=\"color: orange\" href=\"editactorroles.php?FilmTitleID=$res[FilmTitleID]\">Edit</a></td>"; 
        }
        ?>
		    </table>
    	</center>
	</div>

	<div class="table4" id="tb4">
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
		            echo "<td><a style=\"color: orange\" href=\"editactors.php?ActorID=$res[ActorID]\">Edit</a></td>";
		        }
		        ?>
		    </table>
    	</center>
	</div>

	<div class="table5" id="tb5">
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
		            echo "<td><a style=\"color: orange\" href=\"editroletypes.php?RoleTypeID=$res[RoleTypeID]\">Edit</a></td>";
		         }
		        ?>
		    </table>
    	</center>
	</div>

	<div class="table6" id="tb6">
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
		            echo "<td><a style=\"color: orange\" href=\"editfilmcertificates.php?CertificateID=$res[CertificateID]\">Edit</a></td>"; 
		        }
		        ?>
		    </table>
    	</center>
	</div>

	<div class="table7" id="tb7">
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
		             echo "<td><a style=\"color: orange\" href=\"editproducers.php?ProducerID=$res[ProducerID]\">Edit</a></td>";  
		        }
		        ?>
		    </table>
    	</center>
	</div>



</body>
</html>

