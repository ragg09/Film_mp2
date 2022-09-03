<?php
//fetching data in descending order (lastest entry first)
//$result = mysql_query("SELECT * FROM users ORDER BY id DESC"); // mysql_query is deprecated
$resultfilmtitles = mysqli_query($mysqli, "SELECT * FROM filmtitles ORDER BY FilmTitleID DESC");
$resultfilmgenres = mysqli_query($mysqli, "SELECT * FROM filmgenres ORDER BY GenreID DESC");
$resultfilmactorroles = mysqli_query($mysqli, "SELECT * FROM filmactorroles ORDER BY FilmTitleID DESC");
$resultactors = mysqli_query($mysqli, "SELECT * FROM actors ORDER BY ActorID DESC"); 
$resultroletypes = mysqli_query($mysqli, "SELECT * FROM roletypes ORDER BY RoleTypeID DESC");
$resultfilmcertificates = mysqli_query($mysqli, "SELECT * FROM filmcertificates ORDER BY CertificateID DESC");
$resultproducers = mysqli_query($mysqli, "SELECT * FROM producers ORDER BY ProducerID DESC");
$resultfilmtitlesproducers = mysqli_query($mysqli, "SELECT * FROM filmtitlesproducers");

?>
