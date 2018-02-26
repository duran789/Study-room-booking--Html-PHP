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

    
		<?php	
				require('db.php');
 				$user = $_SESSION['username'];
 				 
 				
				$query = "SELECT * FROM `users` WHERE username='$user'|| studentno='$user'";
				$result = mysql_query($query) or die(mysql_error());
				
        		
         
        

				$value = mysql_fetch_object($result);
				$stno = $value->studentno;
				
 		?>
    
    <table>
        <tr>
            <td colspan="5" align=center>
            </br>
           
            
             </br>
            </br>
			</td>
			 </br>
             </br>
            </br>
			</td>
			
				<div class="form">
				<h3>Welcome <?php echo $_SESSION['username']; ?>!</h3>
				<p><a href="logout.php">Logout</a></p>
				
				</br>
				<a href="booking.php">Book Study Room</a>
				
					</br>
				


        </tr>
        <tr>
        	
        	<td> 
			
				<?php
					$query1 = "SELECT * FROM `bookings` WHERE Studentno ='$stno'";
					$result1 = mysql_query($query1) or die(mysql_error());
					
					echo "<table >";
    				// output data of each row
   					 while($row1 = mysql_fetch_array($result1))
						 {
						  	
						  	if(mysql_num_rows($result1)==0)
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
						
						echo "To Cancel booking : "; 
						echo "</br>";
						echo  '<a href="auth3.php">click here</a>'  ;
						
						
						
    				}
					echo "</td>";
					 echo "</tr>";
				 echo "</tabl>";
				?>
			
			</td>
      
        </tr>
       
        </table>
        
       
        
       
      
</body>
</html>