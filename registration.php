<?php
/*
Author: Javed Ur Rehman
Website: https://htmlcssphptutorial.wordpress.com
*/
?>

<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<title>Registration</title>
 <link rel="stylesheet" type="text/css" href="StyleSheet.css"/>
</head>
<body>
<?php
	require('db.php');
    // If form submitted, insert values into the database.
    if (isset($_POST['username'])){
     
     	$studentno = $_POST['studentno'];
        $username = $_POST['username'];
        $name = $_POST['name'];
        $cell = $_POST['cell'];
		$email = $_POST['email'];
        $password = $_POST['password'];
		$username = stripslashes($username);
		$username = mysql_real_escape_string($username);
		$email = stripslashes($email);
		$email = mysql_real_escape_string($email);
		$password = stripslashes($password);
		$password = mysql_real_escape_string($password);
		$trn_date = date("Y-m-d H:i:s");
		
		
		$query = "SELECT * FROM `users` WHERE username ='$username'|| studentno ='$studentno' ";
		$result2 = mysql_query($query) or die(mysql_error());
		
		if(mysql_num_rows($result2)==0)
		{
		 
		 	$query = "INSERT into `users` (studentno , username, name , cell , password, email, trn_date) VALUES ('$studentno' ,'$username', '$name' ,'$cell', '".md5($password)."', '$email', '$trn_date')";
        $result = mysql_query($query);
        if($result){
            echo "<div class='form'><h3>You have registered successfully.</h3><br/>Click here to <a href='auth.php'>Login</a></div>";
        }
			
		}
		else
		{
			echo "<div class='form'><h3>You are already registered.</h3><a href='auth.php'>Login</a><h3>or </h3><a href='registration.php'>Register</a> <h3>with new student number and user name </h3></div>";
			
		}
        
    }
	
	else{
			?>
			<div class="form">
			<h1>Registration</h1>
			<form name="registration" action="" method="post"></br>
			<input type="text" name="studentno" placeholder="Student Number" required /></br>
			<input type="text" name="username" placeholder="Username" required /></br>
			<input type="text" name="name" placeholder="Name" required /></br>
			<input type="text" name="cell" placeholder="Cellphone Number" required /></br>
			<input type="email" name="email" placeholder="Email" required /></br>
			<input type="password" name="password" placeholder="Password" required /></br>
			<input type="submit" name="submit" value="Register" />
			</form>
			</div>
			<?php } ?>
			
</body>
</html>
