<?php
/*
Author: Javed Ur Rehman
Website: https://htmlcssphptutorial.wordpress.com
*/
?>

<?php
session_start();
if(isset($_SESSION["username"]))
{
 	require('db.php');
 		$user = $_SESSION['username'];
 				 
 				
				$query = "SELECT * FROM `users` WHERE username='$user'|| studentno='$user'";
				$result = mysql_query($query) or die(mysql_error());
				
        		
         
        

				$value = mysql_fetch_object($result);
				$stno = $value->studentno;
				
 	$query1 = "DELETE  FROM `bookings` WHERE Studentno ='$stno'";
					$result1 = mysql_query($query1) or die(mysql_error());
header("Location: indexafterlogin.php");
exit(); }
?>
