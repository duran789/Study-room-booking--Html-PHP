<?php
/*
Author: Javed Ur Rehman
Website: https://htmlcssphptutorial.wordpress.com
*/
?>


<?php include("auth2.php"); //include auth.php file on all secure pages ?>
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
	<div class="form">
				<h3>Welcome <?php echo $_SESSION['username']; ?>!</h3>
				<p><a href="logout.php">Logout</a></p>
				
				</br>
			
				</div>
    
		<?php	
				require('db.php');
 			if (isset($_POST['studentno']))
			 {
 				 $studentno= $_POST['studentno'];
 				
				$query = "SELECT * FROM `bookings` WHERE Studentno ='$studentno'";
				$result = mysql_query($query) or die(mysql_error());
					echo "<table >";
        		while($row1 = mysql_fetch_array($result))
						 {
						  	
						  	if(mysql_num_rows($result)==0)
							  {
								echo "<th>";
						  		echo "<h2>Currently you have Booking information</h2>";
						  		echo "</th>";
								}
								else{
								echo "<th>";
						  	echo "<h2>Current Booking</h2>";
						  	echo "</th>";
						  	}
						  	echo "<tr>";
						  	echo "<td align=center bgcolor= white  >";
        			echo "Student Number: " . $row1["Studentno"];
        			echo "</br>";
					echo "Date: " . $row1["Date"]; 
					echo "</br>";
						echo "Time: " . $row1["Time"]; 
						echo "</br>";
						echo "Key Retrieved: " . $row1["keyretrival"]; 
						echo "</br>";
						
						
						
						
						$ro = $row1["Room"];
						
						$query2 = "SELECT * FROM `room` WHERE Room ='$ro'";
					$result2 = mysql_query($query2) or die(mysql_error());
					
						$row2 = mysql_fetch_array($result2);
						
						echo "Room: " . $row2["roomno"]; 
						$lo = $row2["Location"];
						
						echo "</br>";
						
						$query3 = "SELECT * FROM `location` WHERE LocationID ='$lo'";
					$result3 = mysql_query($query3) or die(mysql_error());
					
						$row3 = mysql_fetch_array($result3);
						
						echo "Room: " . $row3["Description"]; 
						echo "</br>";
						echo "Campus: " . $row3["campus"];
						
						 echo "</br>";
						echo "</br>";
						
						
						echo "<h2>Key Retrieved by Student</h2>";
						echo "</br>";
						$_SESSION['username'] = $row1["Studentno"];
						echo  '<a href="adminauth.php">click here</a>'  ;
						echo "</br>";
						
						
							echo "<h2>To Cancel booking</h2>";
						echo "</br>";
						$_SESSION['username'] = $row1["Studentno"];
						echo  '<a href="adminauthdlt.php">click here</a>'  ;
						
						
						
    				}
					echo "</td>";
					 echo "</tr>";
				 echo "</tabl>";
         
        		}

			
				
				
 		?>
 		<div class="form">
			
			</br>
			<h2>Enter Student Details</h2>
			<form name="adminindex" action="" method="post"></br>
			<input type="text" name="studentno" placeholder="Student Number" required /></br>
			<input type="submit" name="submit" value="View Booking" />
		<div>
    
  
        
       
        
       
      
</body>
</html>