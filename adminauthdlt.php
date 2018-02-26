
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
 				 
 				
				$query1 = "DELETE  FROM `bookings` WHERE Studentno ='$user'";
					$result1 = mysql_query($query1) or die(mysql_error());
				
        		
         
        		$_SESSION['username'] = "Admin";
				header("Location: adminindex.php");
exit(); }
?>
