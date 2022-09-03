<?php
//including the database connection file
include("config.php");
//getting id of the data from url
$GenreID = $_GET['GenreID'];
//deleting the row from table
$resultfilmgenres = mysqli_query($mysqli, "DELETE FROM filmgenres WHERE GenreID=$GenreID");
//redirecting to the display page (index.php in our case)

$RoleTypeID = $_GET['RoleTypeID'];
//deleting the row from table
$resultroletypes = mysqli_query($mysqli, "DELETE FROM roletypes WHERE RoleTypeID=$RoleTypeID");

//getting id of the data from url
$ProducerID = $_GET['ProducerID'];
//deleting the row from table
$resultproducers = mysqli_query($mysqli, "DELETE FROM producers WHERE ProducerID=$ProducerID");

header("Location:delete.php");
?>