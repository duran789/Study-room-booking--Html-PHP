<?php
/*
Author: Javed Ur Rehman
Website: https://htmlcssphptutorial.wordpress.com
*/
?>



<!DOCTYPE html>

<html>

<head>
    <meta charset="utf-8" />
    <title></title>
    
    <link rel="stylesheet" type="text/css" href="StyleSheet.css"/>
    <style>
        body {
        
            background-image: url("back3.jpg");
        }

    </style>
  
</head>


<body>

   

<table>
<tr>
</br></br></br></br></br>
</tr>
	<tr>
		<td>
		<?php
	require('db.php');
	session_start();
    // If form submitted, insert values into the database.
    if (isset($_POST['info'])){
        $username = $_POST['info'];
        $password = $_POST['password'];
		$username = stripslashes($username);
		$username = mysql_real_escape_string($username);
		$password = stripslashes($password);
		$password = mysql_real_escape_string($password);
	//Checking is user existing in the database or not
        $query = "SELECT * FROM `users` WHERE username='$username'|| studentno='$username' and password='".md5($password)."'";
		$result = mysql_query($query) or die(mysql_error());
		$rows = mysql_num_rows($result);
        if($rows==1){
         
         $name = $_GET["username"];

$value = mysql_fetch_object($result);
$_SESSION['username'] = $value->username;


			if($_SESSION['username'] == "Admin")
			{
				header("Location: adminindex.php");
			}
			else
			{
				header("Location: indexafterlogin.php");
			}
			 // Redirect user to index.php
            }else{
				echo "<div class='form'><h3>Username/password is incorrect.</h3><br/>Click here to <a href='auth.php'>Login</a></div>";
				}
    }else{
?>
<div class="form">
<h1>Log In</h1>
<form action="" method="post" name="login">
<input type="text" name="info" placeholder="Student Number Or User Name" required /></br>
<input type="password" name="password" placeholder="Password" required /></br>
<input name="submit" type="submit" value="Login" />
</form>
<p>Not registered yet? <a href='registration.php'>Register Here</a></p>
</div>
<?php } ?>
		</td>
	</tr>
</table>
   

</body>
</html>