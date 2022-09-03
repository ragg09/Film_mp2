<html>
<head>
    <title>MOVIE||ADD SUCCESS</title>
    <link href="../css_java/hide_nav.css" rel="stylesheet" type="text/css" />
     <link href="../css_java/mycss.css" rel="stylesheet" type="text/css">
</head>
 
<body>
<?php
//including the database connection file
include_once("config2.php");
 
if(isset($_POST['Submit'])) {    
    //producer
    $ProducerID= $_POST['ProducerID'];

    //certificate
    $Certificate = $_POST['Certificate'];

    //genre
    $GenreID = $_POST['GenreID'];
    
    //filmtitles

    $FilmTitle = $_POST['FilmTitle'];
    $FilmStory = $_POST['FilmStory'];
    $FilmReleaseDate = $_POST['FilmReleaseDate'];
    $FilmDuration = $_POST['FilmDuration'];
    $FilmAdditionalInfo = $_POST['FilmAdditionalInfo'];

    //actors
    $ActorFullName = $_POST['ActorFullName'];
    $ActorNotes = $_POST['ActorNotes'];

    //roletypes
    $RoleTypeID = $_POST['RoleTypeID'];

    //filmactorroles
    $CharacterName = $_POST['CharacterName'];
    $CharacterDescription = $_POST['CharacterDescription'];
        
    // checking empty fields
    if(empty($ProducerID) || empty($Certificate) || empty($GenreID) || empty($FilmTitle) || empty($FilmStory) || empty($FilmReleaseDate) || empty($FilmDuration) || empty($FilmAdditionalInfo) || empty($ActorFullName) || empty($ActorNotes) || empty($CharacterName) || empty($CharacterDescription)) {  
        //producer              
        if(empty($ProducerID)) {
            echo "<font color='red'>ProducerID field is empty.</font><br/>";
        }
        
        //certificate
        if(empty($Certificate)) {
            echo "<font color='red'>Certificate field is empty.</font><br/>";
        }

        //genre
        if(empty($GenreID)) {
            echo "<font color='red'>GenreID field is empty.</font><br/>";
        }

        //filmtitles
        if(empty($FilmTitle)) {
            echo "<font color='red'>Titles field is empty.</font><br/>";
        }
        
        if(empty($FilmStory)) {
            echo "<font color='red'>Story field is empty.</font><br/>";
        }

        if(empty($FilmReleaseDate)) {
            echo "<font color='red'>Release Date field is empty.</font><br/>";
        }
        
        if(empty($FilmDuration)) {
            echo "<font color='red'>Duration field is empty.</font><br/>";
        }

        if(empty($FilmAdditionalInfo)) {
            echo "<font color='red'>Additional Info field is empty.</font><br/>";
        }

        //actors
        if(empty($ActorFullName)) {
            echo "<font color='red'>Name field is empty.</font><br/>";
        }
        
        if(empty($ActorNotes)) {
            echo "<font color='red'>Note field is empty.</font><br/>";
        }

        //filmactorroles
        if(empty($CharacterName)) {
            echo "<font color='red'>Character Name field is empty.</font><br/>";
        }
        
        if(empty($CharacterDescription)) {
            echo "<font color='red'>Description field is empty.</font><br/>";
        }

        //link to the previous page
        echo "<br/><a href='javascript:self.history.back();'>Go Back</a>";
    }
    else { 
        // Check connection
        if (mysqli_connect_errno())
          {
          echo "Failed to connect to MySQL: " . mysqli_connect_error();
          }

        // Set autocommit to off
        mysqli_autocommit($mysqli,FALSE);

        // query
        $resultfilmcertificates = mysqli_query($mysqli, "INSERT INTO filmcertificates(Certificate) VALUES('$Certificate')");
        
        $resultfilmtitles = mysqli_query($mysqli, "INSERT INTO filmtitles(GenreID, CertificateID, FilmTitle, FilmStory, FilmReleaseDate, FilmDuration, FilmAdditionalInfo) VALUES('$GenreID',(SELECT CertificateID FROM filmcertificates ORDER BY CertificateID DESC LIMIT 1),'$FilmTitle','$FilmStory','$FilmReleaseDate','$FilmDuration','$FilmAdditionalInfo')");

        $resultftp = mysqli_query($mysqli, "INSERT INTO filmtitlesproducers(ProducerID, FilmTitleID) VALUES('$ProducerID', (SELECT FilmTitleID FROM filmtitles ORDER BY FilmTitleID DESC LIMIT 1;))");

        $resultactors = mysqli_query($mysqli, "INSERT INTO actors(ActorFullName,ActorNotes) VALUES('$ActorFullName','$ActorNotes')");

        $resultfilmactorroles = mysqli_query($mysqli, "INSERT INTO filmactorroles(FilmTitleID,ActorID,RoleTypeID,CharacterName,CharacterDescription) VALUES((SELECT FilmTitleID FROM filmtitles ORDER BY FilmTitleID DESC LIMIT 1),(SELECT ActorID FROM actors ORDER BY ActorID DESC LIMIT 1),'$RoleTypeID','$CharacterName','$CharacterDescription')");
        
        // Commit transaction
        mysqli_commit($mysqli);

        // Close connection
        mysqli_close($mysqli);
        
        
        echo "<center class='successsmg'>";
        echo "<font color='green'>Data added successfully.";
        echo "<br/><a href='db.php'>Go to Database</a>";
        echo "</center>";
    }
}
?>
</body>
</html>