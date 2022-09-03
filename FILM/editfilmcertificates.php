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
    $CertificateID = $_POST['CertificateID'];
    
    $Certificate=$_POST['Certificate'];

    // checking empty fields
    if(empty($Certificate)) {            
        if(empty($Certificate)) {
            echo "<font color='red'>Certificate field is empty.</font><br/>";
        }
     
    } else {    
            //updating the table
            include("config2.php");
             $user = $_SESSION['username'];
             //updating the table
         $resultfilmcertificates = mysqli_query($mysqli, "UPDATE filmcertificates SET Certificate='$Certificate' WHERE CertificateID=$CertificateID");
        
        //redirectig to the display page. In our case, it is index.php
        header("Location: editable.php#tb6");
        }
    }

}
?>
<?php
//getting id from url
$CertificateID = $_GET['CertificateID'];
 
//selecting data associated with this particular id
$resultfilmcertificates = mysqli_query($mysqli, "SELECT * FROM filmcertificates WHERE CertificateID=$CertificateID");
 
while($res = mysqli_fetch_array($resultfilmcertificates))
{
    $Certificate = $res['Certificate'];

}
?>
<html>
<head>    
   <link href="../css_java/hide_nav.css" rel="stylesheet" type="text/css" />
    <link href="../css_java/main.css" rel="stylesheet" type="text/css" />
</head>
 
<body>
    <?php
        include("nav.php")
    ?>
    <center>
    
    <form name="form1" method="post" action="editfilmcertificates.php">
         <a href="editable.php" style="color: orange">Go To Edit Page</a>
         <br/><br/>
        <table border="0">
            <tr> 
                <td>Certificate</td>
                <td><input type="text" name="Certificate" value="<?php echo $Certificate;?>"></td>
            </tr>
            <tr>
                <td><input type="hidden" name="CertificateID" value=<?php echo $_GET['CertificateID'];?>></td>
                <td><input type="submit" name="update" value="Update"></td>
            </tr>
        </table>
    </form>
</center>
</body>
</html>