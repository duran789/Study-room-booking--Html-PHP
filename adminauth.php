
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
 				 
 				
				$query = "update `bookings` set keyretrival = 'Yes'  where Studentno ='$user'";
				$result = mysql_query($query) or die(mysql_error());
				
        		
         
        $_SESSION['username'] = "Admin";
header("Location: adminindex.php");
exit(); }
?>

