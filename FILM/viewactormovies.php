<?php
session_start();
//including the database connection file
include("config2.php");
include("select.php");

$user = "guest";

if (isset($_SESSION['username']) && ! empty($_SESSION['username']))
{
    $user = $_SESSION['username'];
}

?>
<head>
	<title>MOVIE</title>
	<link href="../css_java/hide_nav.css" rel="stylesheet" type="text/css" />
	 <link href="../css_java/mycss.css" rel="stylesheet" type="text/css">
</head>

<body>
	<?php
	include('nav.php');
	?>
	<center>
	       
        <?php
        include_once("config.php");
        $query="SELECT * FROM FilmTitles where FilmTitleID=".$_GET['FilmTitleID'];
        $result=mysqli_query($mysqli,$query);?>
        
        <form name="update" method="post"><?php

        while($row=mysqli_fetch_array($result)){
            ?>
         <h3 mar><p style="text-align:center;">FILM DETAILS</p></h3><br>
        <a href="home.php"> HOME </a>

        <br><br><br>

        <table>
            <tr>
                <td>Film ID:</td>
                <td><input type="text" name="FilmTitleID" value="<?php echo $row['FilmTitleID'] ?>" readonly></td>
            </tr>
            <tr>
                <td>Film Title: </td>
                <td><input type="text" name="FilmTitle" value="<?php echo $row['FilmTitle']?>"></td>
            </tr>
            <tr>
                <td>Film Story:</td>
                <td><textarea name="FilmStory" cols="20" rows="2" ><?php echo $row['FilmStory']?></textarea></td>
            </tr>
            <tr>
                <td>Film Release Date:</td>
                <td><input type="date" value="<?php echo $row['FilmReleaseDate'] ?>" name="date" /></td>
            </tr>
            <tr>
                <td>Film Duration:</td>
                <td><input type="text" name="Duration" value="<?php echo $row['FilmDuration']?>"></td> 
            </tr>
        
            </tr>
            <tr>
                <td>Additional Info:</td>
                <td><textarea name="AdditionalInfo" cols="20" rows="2" ><?php echo $row['FilmAdditionalInfo']?></textarea>
            </tr>
        </table>
        <hr>
        <h3><p>CHARACTERS &nbsp; <!-- <a href='update_film_add_character.php?FilmTitleID=<?php echo $_GET['FilmTitleID'];?>'>Add Character</a> --></p></h3>
        <?php
        $cquery= " SELECT a.ActorID, a.ActorFullName,fr.CharacterName, r.RoleType from Actors a INNER JOIN FilmActorRoles fr ON fr.ActorID=a.ActorID
        INNER JOIN RoleTypes r ON r.RoleTypeID=fr.RoleTypeID
        INNER JOIN FilmTitles f ON fr.FilmTitleID=f.FilmTitleID
        where f.FilmTitleID=".$_GET['FilmTitleID'].";";
        $result=mysqli_query($mysqli,$cquery);?>
        <table border="1">
            <tr>
                <td>Actor ID</td>
                <td>Actor Name</td>
                <td>Character Name</td>
                <td>Role Type</td>
            </tr>
            <?php
            while($row=mysqli_fetch_array($result)){
                echo"<tr>";
                echo "<td>".$row[0]."</td>";
                echo "<td>".$row[1]."</td>";
                echo "<td>".$row[2]."</td>";
                echo "<td>".$row[3]."</td>";
                // echo"<td><a href='update_character.php?ActorID=".$row[0]."&FilmTitleID=".$_GET['FilmTitleID']."'>VIEW</a></td>";
                // echo"<td><a href='update_film_delete_character.php?ActorID=".$row[0]."&FilmTitleID=".$_GET['FilmTitleID']."'>DELETE</a></td>";
            echo"</tr>";
            }
        }
        ?>
        </table><br>


        <!-- Producers -->

        <h3><p>PRODUCERS &nbsp; <!-- <a href='update_film_add_producers.php?FilmTitleID=<?php echo $_GET['FilmTitleID'];?>'>Add Producers</a> --></p></h3>
        <?php
        $cquery= "SELECT tp.ProducerID, p.ProducerName from  filmtitlesproducers tp 
        INNER JOIN producers p ON tp.ProducerID=p.ProducerID INNER JOIN FilmTitles t ON t.FilmTitleID=tp.FilmTitleID where tp.FilmTitleID=".$_GET['FilmTitleID'].";";
        $result=mysqli_query($mysqli,$cquery) or die(mysqli_error($mysqli));
        //echo $cquery;
        ?>
        <table border="1">
            <tr>
                <td>Producer ID</td>
                <td>Producer Name</td>
            </tr>
            <?php
            while($row=mysqli_fetch_array($result)){
                echo"<tr>";
                echo "<td>".$row[0]."</td>";
                echo "<td>".$row[1]."</td>";
            //     echo"<td><a href='update_film_producer.php?ProducerID=".$row[0]."&FilmTitleID=".$_GET['FilmTitleID']."'>VIEW</a></td>";
            //     echo"<td><a href='update_film_delete_producer.php?ProducerID=".$row[0]."&FilmTitleID=".$_GET['FilmTitleID']."'>DELETE</a></td>";
             echo"</tr>";
            }
        ?>
        </table><br>
        </form>
        </center>
    </body>
</html>