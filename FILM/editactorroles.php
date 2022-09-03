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
{    
    $FilmTitleID = $_POST['FilmTitleID'];
    
    $CharacterName=$_POST['CharacterName'];
    $CharacterDescription=$_POST['CharacterDescription']; 

    // checking empty fields
    if(empty($CharacterName) || empty($CharacterDescription)) {            
        if(empty($CharacterName)) {
            echo "<font color='red'>Name field is empty.</font><br/>";
        }
        
        if(empty($CharacterDescription)) {
            echo "<font color='red'>Description field is empty.</font><br/>";
        }
     
    } else {    
            //updating the table
            include("config2.php");
             $user = $_SESSION['username'];
            $resultfilmactorroles = mysqli_query($mysqli, "UPDATE filmactorroles SET CharacterName='$CharacterName',CharacterDescription='$CharacterDescription' WHERE FilmTitleID=$FilmTitleID");
        
        //redirectig to the display page. In our case, it is index.php
        header("Location: editable.php#tb3");
        }
    }

}
?>
<?php
//getting id from url
$FilmTitleID = $_GET['FilmTitleID'];
 
//selecting data associated with this particular id
$resultfilmactorroles = mysqli_query($mysqli, "SELECT * FROM filmactorroles WHERE FilmTitleID=$FilmTitleID");
 
while($res = mysqli_fetch_array($resultfilmactorroles))
{
    $CharacterName = $res['CharacterName'];
    $CharacterDescription = $res['CharacterDescription']; 
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
    <form name="form1" method="post" action="editactorroles.php">
          <a href="editable.php" style="color: orange">Go To Edit Page</a>
    <br/><br/>
        <table border="0">
            <tr> 
                <td>CharacterName</td>
                <td><input type="text" name="CharacterName" value="<?php echo $CharacterName;?>"></td>
            </tr>
            <tr> 
                <td>CharacterDescription</td>
                <td><input type="text" name="CharacterDescription" value="<?php echo $CharacterDescription;?>"></td>
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