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
    // If form submitted, insert values into the database.
    if (isset($_POST['q1'])){
     
     	
     	$username = $_SESSION['username'];
        $campus = $_POST['q1'];
        $data = $_POST['daytime'];
          $time= $_POST['usr_time'];
          $room01 =2;
      
	 	$query = "SELECT * FROM `users` WHERE username='$username'|| studentno='$username' ";
		$result = mysql_query($query) or die(mysql_error());
		$rows = mysql_num_rows($result);
       

		$value = mysql_fetch_object($result);
		$studentno  = $value->studentno;
		
		
			$query2 = "SELECT * FROM `bookings` WHERE studentno ='$studentno' ";
		$result2 = mysql_query($query2) or die(mysql_error());
		if (mysql_num_rows($result2)==0)
		{
		 
		 
		 $bol = 'f';
		 $query3 = "SELECT * FROM `room` WHERE Location ='$campus' ";
		$result3 = mysql_query($query3) or die(mysql_error());
		
		 
		 while($row1 = mysql_fetch_array($result3) ) 
				   {
				    
        				$room = $row1['Room'];
        				$roomno = $row1['roomno'];
        				$location = $row1['Location'];
        				
        				$query4 = "SELECT * FROM `bookings` WHERE Room ='$room' && Date = '$data' && Time = '$time' ";
						$result4 = mysql_query($query4) or die(mysql_error());
        				if(mysql_num_rows($result4)==0 && $bol == 'f')
        				{
        				 	
							$room01 = $row1['Room'];
							$bol = 't';
						}
						else
						{
						
        					
						}
					}
		 
		 
		 
		 	$query = "INSERT into `bookings` (studentno , Room , Date, Time ,keyretrival) VALUES ('$studentno' ,'$room01','$data','$time' ,'No')";
        	$result = mysql_query($query);
        	if($result)
			{
            echo "<div class='form'><h3>You have booked a study room successfully.</h3><br/>Click here to <a href='auth.php'>View Booking</a></div>";
        	}
        	else{
				
			}
		 
		 
			
		}
		
		else
		{
			
		
				echo "<div class='form'><h3>You have already booked a study room. </h3><br/>Click here to <a href='auth.php'>View Booking</a></div>";
			
			
		
        }
    }
	
	else{
			?>
		
			
			<form name="booking" action="booking.php" method="post">
		
		
			
			<table>
			
			<th colspan="5" align=center>
			<h1>Study Room Booking</h1></br>
				<h2>Select a Camapus you would like to book a study room in.</h2>
			</th>
			</table>
			
			<table>
			<tr>
				<td align ="center">
						<h2>ML Sultan Campus</h2><input type="radio" name="q1" value="ml01" >
				</td>
			
				</tr>
				
				<tr>
				
			
				<td align ="center" >
						   <h2>Steve Biko Campus</h2><input type="radio" name="q1" value="biko01"  />
				</td>
				
				
			</tr>
			
			
			
			
			</table>
			<table>
			<tr>
				<td align="center">
				<h2>Select a date</h2>
				</td>
				<td>
					<input style="width:200px; font-size: 1rem; " type="date" name="daytime">
				</td>
			</tr>
		
		
			<tr>
				<td align="center">
				<h2>Select a Time </h2>
				</td>
				<td align="left">
					<input type="time" step = 3600 name="usr_time">
				</td>
			</tr>
			
			<tr>
			  <td align="center">	<input type="submit" name="submit" value="Book" /></td>
			</tr>
			</table>
			
			

			
			
			
		
			</form>
			
			<?php } ?>
			
</body>




        
       
      

</html>