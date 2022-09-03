<html>
<head>
    <title>CREATE ACTORS</title>
     <link href="../css_java/hide_nav.css" rel="stylesheet" type="text/css" />
     <link href="../css_java/mycss.css" rel="stylesheet" type="text/css">
</head>
 
<body>
<?php
//including the database connection file
include_once("config2.php");
 
if(isset($_POST['Submit'])) {    
    $ActorFullName = $_POST['ActorFullName'];
    $ActorNotes = $_POST['ActorNotes'];
        
    // checking empty fields
    if(empty($ActorFullName) || empty($ActorNotes)) {                
        if(empty($ActorFullName)) {
            echo "<font color='red'>Name field is empty.</font><br/>";
        }
        
        if(empty($ActorNotes)) {
            echo "<font color='red'>Note field is empty.</font><br/>";
        }

        //link to the previous page
        echo "<br/><a href='javascript:self.history.back();'>Go Back</a>";
    } else { 
        // if all the fields are filled (not empty)             
        //insert data to database
        $query = "INSERT INTO actors(ActorFullName,ActorNotes) VALUES(?,?)";
        //'$ActorFullName','$ActorNotes'

       // $result = mysqli_query($mysqli, );

        $result = mysqli_prepare($mysqli,$query);
        $result->bind_param("ss",$ActorFullName,$ActorNotes) or die(mysqli_error);
        $result->execute();
        $result->close();
        
        //display success message
        echo "<center class='successsmg'>";
        echo "<font color='green'>Data added successfully.";
        echo "<br/><a href='db.php'>Go to Database</a>";
        echo "</center>";
    }
}
?>
</body>
</html> 