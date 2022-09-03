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
    $Genre = $_POST['Genre'];
        
    // checking empty fields
    if(empty($Genre)) {                
        if(empty($Genre)) {
            echo "<font color='red'>Genre field is empty.</font><br/>";
        }

        //link to the previous page
        echo "<br/><a href='javascript:self.history.back();'>Go Back</a>";
    } 
    else { 
        // if all the fields are filled (not empty)             
        //insert data to database

        //$resultGenres = mysqli_query($mysqli, "INSERT INTO filmgenres(Genre) VALUES('$Genre')");

        $query = "INSERT INTO filmgenres(Genre) VALUES(?)";

        $resultGenres = mysqli_prepare($mysqli,$query);
        $resultGenres->bind_param("s",$Genre) or die(mysqli_error);
        $resultGenres->execute();
        $resultGenres->close();
        
         
        echo "<center class='successsmg'>";
        echo "<font color='green'>Data added successfully.";
        echo "<br/><a href='db.php'>Go to Database</a>";
        echo "</center>";
    }
}
?>
</body>
</html>