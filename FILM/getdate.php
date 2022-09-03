<?php

$StartDate = "";
$EndDate = "";

	if(isset($_GET['startDate']))
	{
		$StartDate = date_format(new DateTime($_GET['startDate']), "Y-m-d");
		$EndDate = date_format(new DateTime($_GET['endDate']), "Y-m-d");
		$sql = "CALL date_time_picker('$StartDate', '$EndDate')";
		
	}
	else
	{
		$sql = "SELECT * FROM filmtitles ORDER BY FilmTitleID DESC";
	}
	
	$result = mysqli_query($mysqli,$sql);



?>