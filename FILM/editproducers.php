<?php
session_start();

//trapping
if($_SESSION['username'] == !"rene"){
    header("location:login.php");
}


 if(session_id() != ""){
    include("config.php");
    $user = "guest";
 }
 
if (isset($_SESSION['username']) && ! empty($_SESSION['username']))
{
    $user = $_SESSION['username'];

  if(isset($_POST['update']))
{    $ProducerID = $_POST['ProducerID'];
    
    
    $ProducerName=$_POST['ProducerName'];
    $ContactEmailAddress=$_POST['ContactEmailAddress']; 
    $Website=$_POST['Website'];
    // checking empty fields
    if(empty($ProducerName) || empty($ContactEmailAddress) || empty($Website)) {            
        if(empty($ProducerName)) {
            echo "<font color='red'>Name field is empty.</font><br/>";
        }
        
        if(empty($ContactEmailAddress)) {
            echo "<font color='red'>ContactEmailAddress field is empty.</font><br/>";
        }

        if(empty($Website)) {
            echo "<font color='red'>Website field is empty.</font><br/>";
        }
     
    } else {    
            //updating the table
            include("config2.php");
             $user = $_SESSION['username'];
             //updating the table
         $resultproducers = mysqli_query($mysqli, "UPDATE producers SET ProducerName='$ProducerName',ContactEmailAddress='$ContactEmailAddress',Website='$Website' WHERE ProducerID=$ProducerID");
        
        //redirectig to the display page. In our case, it is index.php
        header("Location: editable.php#tb7");
        }
    }

}

?>
<?php
//getting id from url
$ProducerID = $_GET['ProducerID'];
 
//selecting data associated with this particular id
$resultproducers = mysqli_query($mysqli, "SELECT * FROM producers WHERE ProducerID=$ProducerID");
 
while($res = mysqli_fetch_array($resultproducers))
{
    $ProducerName = $res['ProducerName'];
    $ContactEmailAddress = $res['ContactEmailAddress']; 
    $Website = $res['Website'];
}
?>
<html>
<head>    
    <title>Edit Data</title>
 <link href="../css_java/hide_nav.css" rel="stylesheet" type="text/css" />
    <link href="../css_java/main.css" rel="stylesheet" type="text/css" />
</head>
 
<body>
    <?php
        include("nav.php")
    ?>
    <center>
    
    <form name="form1" method="post" action="editproducers.php">
         <a href="editable.php" style="color: orange">Go To Edit Page</a>
        <table border="0">
            <tr> 
                <td>Name</td>
                <td><input type="text" name="ProducerName" value="<?php echo $ProducerName;?>"></td>
            </tr>
            <tr> 
                <td>Age</td>
                <td><input type="text" name="ContactEmailAddress" value="<?php echo $ContactEmailAddress;?>"></td>
            </tr>
            <tr> 
                <td>Website</td>
                <td><input type="text" name="Website" value="<?php echo $Website;?>"></td>
            </tr>
            <tr>
                <td><input type="hidden" name="ProducerID" value=<?php echo $_GET['ProducerID'];?>></td>
                <td><input type="submit" name="update" value="Update"></td>
            </tr>
        </table>
    </form>
</center>
</body>
</html>