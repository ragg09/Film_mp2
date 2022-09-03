<!DOCTYPE html>

<?php
//including the database connection file


session_start();

 if(session_id() != ""){
   include("config.php");
   $_SESSION['username'] = "guest";

   $user = $_SESSION['username'];
 }
 
if (isset($_SESSION['username']) && ! empty($_SESSION['username']))
{
   $user = $_SESSION['username'];
}

?>

<html>
<head>
  
   <link href="../css_java/home.css" rel="stylesheet" type="text/css">

   <style type="text/css">
      .login_form{
         border: 5px dotted orangered;
         width: 550px;
         height: 250px;
      }

      label{
         color: white;
      }
   </style>
   
</head>

<body>
   <div class="sliding">
      <div class="slidy">
         <figure>
            <div>
               <img src="../images/slidy1.png">
            </div>
            
            <div>
               <img src="../images/slidy2.png">
            </div>
            
            <div>
               <img src="../images/slidy3.png">
            </div>
            
            <div>
               <img src="../images/slidy4.png">
            </div>
            
            <div>
               <img src="../images/slidy5.jpg">
            </div>
         </figure>
      </div>
   </div>   

   <center>
   
   <div style="margin-top: 250px;">
      <hr width="2%" color="#b2474c">
      <hr width="5%" color="#bf4c40">
      <hr width="10%" color="#cc5233">
      <hr width="15%" color="#d95726">
      <hr width="20%" color="#e65c1a">
      <hr width="25%" color="#f2610d">
      <hr width="30%" color="#ff6600">
      <div class="login_form">
         <form action="script.php" class="form-container" method="post">
        <h1>Login</h1>
        <table>
           <tr>
               <td> <label for="username"><b>Username</b></label></td>
               <td><input type="text" placeholder="Enter Username" name="username" id="un" required></td>
           </tr>

           <tr>
               <td><label for="password"><b>Password</b></label></td>
               <td>  <input type="password" placeholder="Enter Password" name="password" id="pw" required></td>
           </tr>
        </table>
         <br>
        <button type="submit" name="submit" class="btn" onclick="myFunction()">Login</button> 
    </form>
      </div>
      <hr width="30%" color="#ff6600">
      <hr width="25%" color="#f2610d">
      <hr width="20%" color="#e65c1a">
      <hr width="15%" color="#d95726">
      <hr width="10%" color="#cc5233">
      <hr width="5%" color="#bf4c40">
      <hr width="2%" color="#b2474c"> 

   </div>
   </center>
<script>
function myFunction() {
  if (document.getElementById('un').value != "rene" && document.getElementById('pw').value != "rene" ) {
    window.alert("INVALID USERNAME OR PASSWORD");
  }
}
</script>
</body>
</html>

