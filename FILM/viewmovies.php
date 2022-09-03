<!DOCTYPE html>

<?php
session_start();
//including the database connection file
include("config.php");
include("select.php");

$user = "guest";

if (isset($_SESSION['username']) && ! empty($_SESSION['username']))
{
	$user = $_SESSION['username'];
}

$StartDate = "";
$EndDate = "";

	if(isset($_GET['startDate']))
	{
		include("config2.php");
		$StartDate = date_format(new DateTime($_GET['startDate']), "Y-m-d");
		$EndDate = date_format(new DateTime($_GET['endDate']), "Y-m-d");
		$sql = "CALL dtp('$StartDate', '$EndDate')";
		
	}
	else
	{
		$sql = "SELECT * FROM vfilms";
	}
	
	$result = mysqli_query($mysqli,$sql);



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
			<h4>MOVIES</h4> 
			<form action="" method="GET" class="dtp">
		<h3>Select Dates</h3>
		<div class="input">
			START DATE <input type="Date" name="startDate" class="form-control">
		</div>
		<div class="input">
			END DATE <input type="Date" name="endDate" class="form-control">
		</div>
		<input type="Submit" name="Submit" id="btn">
	</form>


	<br><br>
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



<!--<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>--> <!-- this is the direct link for hiding nav -->
	<script src="../css_java/hide_nav1.js"> </script> <!-- this is the actual code for hiding nav -->
	<script src="../css_java/hide_nav.js"> </script>	
</body>
</html>

