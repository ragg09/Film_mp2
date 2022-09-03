<?php
//including the database connection file
include("config.php");
//getting id of the data from url
$FilmTitleID = $_GET['FilmTitleID'];
//deleting the row from table
$resultfilmgenres = mysqli_query($mysqli, "DELETE FROM filmgenres WHERE GenreID=$GenreID");
//redirecting to the display page (index.php in our case)

header("Location:delete.php");
?>