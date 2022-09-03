<?php
// including the database connection file

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
    $ActorID = $_POST['ActorID'];
    
    $ActorFullName=$_POST['ActorFullName'];
    $ActorNotes=$_POST['ActorNotes']; 

    // checking empty fields
    if(empty($ActorFullName) || empty($ActorNotes)) {            
        if(empty($ActorFullName)) {
            echo "<font color='red'>Name field is empty.</font><br/>";
        }
        
        if(empty($ActorNotes)) {
            echo "<font color='red'>Age field is empty.</font><br/>";
        }
     
    } else {    
        //updating the table
        include("config2.php");
         $user = $_SESSION['username'];
        $result = mysqli_query($mysqli, "UPDATE actors SET ActorFullName='$ActorFullName',ActorNotes='$ActorNotes' WHERE ActorID=$ActorID");
        
        //redirectig to the display page. In our case, it is index.php
        header("Location: editable.php#tb4");
    }
}

}
?>
<?php
//getting id from url
$ActorID = $_GET['ActorID'];
 
//selecting data associated with this particular id
$result = mysqli_query($mysqli, "SELECT * FROM actors WHERE ActorID=$ActorID");
 
while($res = mysqli_fetch_array($result))
{
    $ActorFullName = $res['ActorFullName'];
    $ActorNotes = $res['ActorNotes']; 
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
    <form name="form1" method="post" action="editactors.php">
         <a href="editable.php" style="color: orange">Go To Edit Page</a>
         <br/><br/>
        <table border="0">
            <tr> 
                <td>Name</td>
                <td><input type="text" name="ActorFullName" value="<?php echo $ActorFullName;?>"></td>
            </tr>
            <tr> 
                <td>Note</td>
                <td><input type="text" name="ActorNotes" value="<?php echo $ActorNotes;?>"></td>
            </tr>
            <tr>
                <td><input type="hidden" name="ActorID" value=<?php echo $_GET['ActorID'];?>></td>
                <td><input type="submit" name="update" value="Update"></td>
            </tr>
        </table>
    </form>
    </center>
</body>
</html>