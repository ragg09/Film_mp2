<?php
//including the database connection file
include_once("config.php");

 // if (isset($_POST['Submit'])) {
				
 //    if ($_POST['username'] == 'rene' && 
 //        $_POST['password'] == 'rene') {
 //        $_SESSION['valid'] = true;
 //        $_SESSION['timeout'] = time();
 //        $_SESSION['username'] = 'rene';
	// }else {
 //       $msg = 'Wrong username or password';
	// }
 // }


// if(isset($_POST['Submit'])) {    
//    $username = $_SESSION['username'];
        
//     include('nav.php');
   
//     } else { 
//        include('nav_guest.php');
//     }
if (isset($_POST['submit'])) {
				
    if ($_POST['username'] == 'rene' &&   $_POST['password'] == 'rene') {
        $_SESSION['valid'] = true;
        $_SESSION['timeout'] = time();
        $_SESSION['username'] = 'rene';
        }
	 }



if( $_SESSION['username'] === 'rene') {    
     $_SESSION['username'] === 'rene';
    include('nav.php');

   
    } 	
 if( $_SESSION['username'] === session_id()) { 
       include('nav_guest.php');
    }


?>