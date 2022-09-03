<!DOCTYPE html>

<?php
//including the database connection file
include_once("config.php");

include("select.php");
$StartDate = "";
$EndDate = "";

	if(isset($_GET['startDate']))
	{
		$StartDate = date_format(new DateTime($_GET['startDate']), "Y-m-d");
		$EndDate = date_format(new DateTime($_GET['endDate']), "Y-m-d");
		$sql = "CALL dtp('$StartDate', '$EndDate')";
		
	}
	else
	{
		$sql = "SELECT * FROM filmtitles ORDER BY FilmTitleID DESC";
	}
	$result = mysqli_query($mysqli,$sql);
	
echo $sql;
?>


<!-- ******************************************************** -->

<html>
<head>
	<title>MOVIE</title>
	<link href="../css_java/hide_nav.css" rel="stylesheet" type="text/css" />
	<link href="../css_java/newmain.css" rel="stylesheet" type="text/css" />
</head>

<body>


	
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
		       if($result)
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
		        else{
		        	echo mysqli_error($mysqli);
		        }
		        ?>
		    </table>
	    </center>
	</div>
<form action="" method="GET" style="width: 20rem;">
		<div class="input-group-prepend">
			START DATE <input type="Date" name="startDate" class="form-control">
		</div>
		<div class="input-group-prepend">
			END DATE <input type="Date" name="endDate" class="form-control">
		</div>
		<input type="Submit" name="Submit">
	</form>
<!--<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>--> <!-- this is the direct link for hiding nav -->
	<script src="../css_java/hide_nav1.js"> </script> <!-- this is the actual code for hiding nav -->
	<script src="../css_java/hide_nav.js"> </script>	
</body>
</html>

