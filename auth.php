<?php
/*
Author: Javed Ur Rehman
Website: https://htmlcssphptutorial.wordpress.com
*/
?>

<?php
session_start();
if(!isset($_SESSION["username"])){
header("Location: indexlogin.php");
exit(); }

else
{
 
	if($_SESSION['username'] == "Admin")
			{
				header("Location: adminindex.php");
			}
			else
			{
				header("Location: indexafterlogin.php");
			}
exit(); }

?>
