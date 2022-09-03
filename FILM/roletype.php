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
    $RoleType = $_POST['RoleType'];
        
    // checking empty fields
    if(empty($RoleType)) {                
        if(empty($RoleType)) {
            echo "<font color='red'>Name field is empty.</font><br/>";
        }

        //link to the previous page
        echo "<br/><a href='javascript:self.history.back();'>Go Back</a>";
    } 
    else { 
        // if all the fields are filled (not empty)             
        //insert data to database

        //$resultroletypes = mysqli_query($mysqli, "INSERT INTO roletypes(RoleType) VALUES('$RoleType')");

        $query = "INSERT INTO roletypes(RoleType) VALUES(?)";

        $resultroletypes = mysqli_prepare($mysqli,$query);
        $resultroletypes->bind_param("s",$RoleType) or die(mysqli_error);
        $resultroletypes->execute();
        $resultroletypes->close();
        
        echo "<center class='successsmg'>";
        echo "<font color='green'>Data added successfully.";
        echo "<br/><a href='db.php'>Go to Database</a>";
        echo "</center>";
    }
}
?>
</body>
</html>