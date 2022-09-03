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
{    $RoleTypeID = $_POST['RoleTypeID'];
    
    
    $RoleType=$_POST['RoleType'];

    // checking empty fields
    if(empty($RoleType)) {            
        if(empty($RoleType)) {
            echo "<font color='red'>Role Type field is empty.</font><br/>";
        }
        
     
    } else {    
            //updating the table
            include("config2.php");
             $user = $_SESSION['username'];
             //updating the table
        $resultroletypes = mysqli_query($mysqli, "UPDATE roletypes SET RoleType='$RoleType' WHERE RoleTypeID=$RoleTypeID");
        
        //redirectig to the display page. In our case, it is index.php
        header("Location: editable.php#tb5");
        }
    }

}
?>
<?php
//getting id from url
$RoleTypeID = $_GET['RoleTypeID'];
 
//selecting data associated with this particular id
$resultroletypes = mysqli_query($mysqli, "SELECT * FROM roletypes WHERE RoleTypeID=$RoleTypeID");
 
while($res = mysqli_fetch_array($resultroletypes))
{
    $RoleType = $res['RoleType'];
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
    <form name="form1" method="post" action="editroletypes.php">
         <a href="editable.php" style="color: orange">Go To Edit Page</a>
         <br/><br/>
        <table border="0">
            <tr> 
                <td>RoleType</td>
                <td><input type="text" name="RoleType" value="<?php echo $RoleType;?>"></td>
            </tr>
            <tr>
                <td><input type="hidden" name="RoleTypeID" value=<?php echo $_GET['RoleTypeID'];?>></td>
                <td><input type="submit" name="update" value="Update"></td>
            </tr>
        </table>
    </form>
</center>
</body>
</html>