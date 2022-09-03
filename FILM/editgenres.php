<?php
session_start();

//trapping
if($_SESSION['username'] == !"rene"){
    header("location:login.php");
}


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
{    
    $GenreID = $_POST['GenreID'];
    
    $Genre=$_POST['Genre'];

    // checking empty fields
    if(empty($Genre)) {            
        if(empty($Genre)) {
            echo "<font color='red'>Genre field is empty.</font><br/>";
        }
    }else {    
            //updating the table
            include("config2.php");
             $user = $_SESSION['username'];
             $resultfilmgenres = mysqli_query($mysqli, "UPDATE filmgenres SET Genre='$Genre' WHERE GenreID=$GenreID");
        
        //redirectig to the display page. In our case, it is index.php
        header("Location: editable.php#tb2");
        }
    }

}
?>
<?php
//getting id from url
$GenreID = $_GET['GenreID'];
 
//selecting data associated with this particular id
$resultfilmgenres = mysqli_query($mysqli, "SELECT * FROM filmgenres WHERE GenreID=$GenreID");
 
while($res = mysqli_fetch_array($resultfilmgenres))
{
    $Genre = $res['Genre'];
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
    <form name="form1" method="post" action="editgenres.php">
        <a href="editable.php" style="color: orange">Go To Edit Page</a>
         <br/><br/>
        <table border="0">
            <tr> 
                <td>Genre</td>
                <td><input type="text" name="Genre" value="<?php echo $Genre;?>"></td>
            </tr>
            <tr>
                <td><input type="hidden" name="GenreID" value=<?php echo $_GET['GenreID'];?>></td>
                <td><input type="submit" name="update" value="Update"></td>
            </tr>
        </table>
    </form>
    </center>
</body>
</html>