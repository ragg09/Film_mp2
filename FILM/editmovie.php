<?php
// including the database connection file
include_once("config.php");

//trapping
if($_SESSION['username'] == !"rene"){
    header("location:login.php");
}


 
if(isset($_POST['update']))
{    $FilmTitleID = $_POST['FilmTitleID'];
    
    $FilmTitle= mysqli_query($mysqli, "SELECT FilmTitle FROM filmtitles WHERE FilmTitleID=$FilmTitleID");
    $FilmStory=$_POST['FilmStory'];
    $FilmReleaseDate=$_POST['FilmReleaseDate'];
    $FilmDuration=$_POST['FilmDuration'];
    $FilmAdditionalInfo=$_POST['FilmAdditionalInfo'];  

    // checking empty fields
    if(empty($FilmTitle) || empty($FilmStory) || empty($FilmReleaseDate) || empty($FilmDuration) || empty($FilmAdditionalInfo)) {            

        if(empty($FilmTitle)) {
            echo "<font color='red'>Name field is empty.</font><br/>";
        }
        
        if(empty($FilmStory)) {
            echo "<font color='red'>Age field is empty.</font><br/>";
        }

        if(empty($FilmReleaseDate)) {
            echo "<font color='red'>Age field is empty.</font><br/>";
        }
        if(empty($FilmDuration)) {
            echo "<font color='red'>Name field is empty.</font><br/>";
        }
        
        if(empty($FilmAdditionalInfo)) {
            echo "<font color='red'>Age field is empty.</font><br/>";
        }
     
    } 
    else {    
        //updating the table
        $resultfilmtitles = mysqli_query($mysqli, "UPDATE filmtitles SET FilmTitle='$FilmTitle',FilmStory='$FilmStory',FilmReleaseDate='$FilmReleaseDate',FilmDuration='$FilmDuration',FilmAdditionalInfo='$FilmAdditionalInfo' WHERE FilmTitleID=$FilmTitleID");
        
        //redirectig to the display page. In our case, it is index.php
        header("Location: editable.php");
    }
}
?>
<?php
//getting id from url
$FilmTitleID = $_GET['FilmTitleID'];
 
//selecting data associated with this particular id
$resultfilmtitles = mysqli_query($mysqli, "SELECT * FROM filmtitles WHERE FilmTitleID=$FilmTitleID");
 
while($res = mysqli_fetch_array($resultfilmtitles))
{
    $FilmTitle=$res['FilmTitle'];
    $FilmStory=$res['FilmStory'];
    $FilmReleaseDate=$res['FilmReleaseDate'];
    $FilmDuration=$res['FilmDuration'];
    $FilmAdditionalInfo=$res['FilmAdditionalInfo']; 
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

        $FilmTitleID = $_POST['FilmTitleID'];
    
        $FilmTitle= mysqli_query($mysqli, "SELECT FilmTitle FROM filmtitles WHERE FilmTitleID=$FilmTitleID");

    ?>

    <center>
   
    
    <form name="form1" method="post" action="editmovie.php">
         <br/><br/>
        <table border="0">
            <tr> 
                <td>FilmTitle</td>
                <td><input type="text" name="FilmTitle" value="<?php echo $FilmTitle; ?>"></td>
            </tr>
            <tr> 
                <td>FilmStory</td>
                <td><input type="text" name="FilmStory" value="<?php echo $FilmStory;?>"></td>
            </tr>
            <tr> 
                <td>FilmReleaseDate</td>
                <td><input type="text" name="FilmReleaseDate" value="<?php echo $FilmReleaseDate;?>"></td>
            </tr>
            <tr> 
                <td>FilmDuration</td>
                <td><input type="text" name="FilmDuration" value="<?php echo $FilmDuration;?>"></td>
            </tr>
            <tr> 
                <td>FilmAdditionalInfo</td>
                <td><input type="text" name="FilmAdditionalInfo" value="<?php echo $FilmAdditionalInfo;?>"></td>
            </tr>

            <tr>
                <td><input type="hidden" name="FilmTitleID" value=<?php echo $_GET['FilmTitleID'];?>></td>
                <td><input type="submit" name="update" value="Update"></td>
            </tr>
        </table>
    </form>
    </center>
</body>
</html>