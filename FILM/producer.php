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
    $ProducerName = $_POST['ProducerName'];
    $ContactEmailAddress = $_POST['ContactEmailAddress'];
    $Website = $_POST['Website'];
        
    // checking empty fields
    if(empty($ProducerName) || empty($ContactEmailAddress) || empty($Website)) {                
        if(empty($ProducerName)) {
            echo "<font color='red'>Name field is empty.</font><br/>";
        }
        
        if(empty($ContactEmailAddress)) {
            echo "<font color='red'>Email Add field is empty.</font><br/>";
        }

         if(empty($Website)) {
            echo "<font color='red'>Note field is empty.</font><br/>";
        }

        //link to the previous page
        echo "<br/><a href='javascript:self.history.back();'>Go Back</a>";
    }
    else { 
        // if all the fields are filled (not empty)             
        //insert data to database

        //$resultproducers = mysqli_query($mysqli, "INSERT INTO producers(ProducerName,ContactEmailAddress,Website) VALUES('$ProducerName','$ContactEmailAddress','$Website')");


        $query = "INSERT INTO producers(ProducerName,ContactEmailAddress,Website) VALUES(?,?,?)";

        $resultproducers = mysqli_prepare($mysqli,$query);
        $resultproducers->bind_param("sss",$ProducerName,$ContactEmailAddress,$Website) or die(mysqli_error);
        $resultproducers->execute();
        $resultproducers->close();

        echo "<center class='successsmg'>";
        echo "<font color='green'>Data added successfully.";
        echo "<br/><a href='db.php'>Go to Database</a>";
        echo "</center>";
    }
}
?>
</body>
</html>