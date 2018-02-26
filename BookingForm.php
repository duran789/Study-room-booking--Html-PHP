<html>
 <link rel="stylesheet" type="text/css" href="styles.css" />
<?php
      $con=mysql_connect("localhost","root","");
      if(!$con)
        die("Could not connect".mysql_error());
        mysql_select_db("Cinema_DB");
        $results1=mysql_query("Select * from Movies");
        $results2=mysql_query("Select * from Cinema");
        
        $today=date("Y-m-d");
        
        $bidErr=0;$bid="";
        $numErr=0;$num="";
        $dErr=0; $dis='n';
        if(isset($_POST["submit"]))
			{
		 				 
		 		if($_POST["bid"]==NULL)
		 			$bidErr=1;
		 		else
		 			$bid=$_POST["bid"];
		 			
		 		if($_POST["num"]==NULL)
		 			$numErr=1;
		 		else
		 			$num=$_POST["num"];	
		 			
		 		if(isset($_POST["disabled"]))
		 			$dis=$_POST["disabled"];
		 		else
		 			$dErr=1;
		 			
		 			
		 	}	
		 		
        
  ?>
  
  <body>
       <form action="BookingForm.php" method="post">
	   <h1>Make your Booking</h1>
	   <table border="7" width="50%">
	   
	        <tr><td>Booking ID</td><td><input type="text" name="bid" size="10" value='<?php echo $bid?>' /><?php if ($bidErr) echo "Enter Booking ID" ?></td></tr>
	         <tr><td>Select a Movie</td><td>
			    <select name="movie">
			        <?php
			                while($moviearr=mysql_fetch_row($results1))
			                     echo"<option value='$moviearr[0]'>$moviearr[0]</option>";
			          ?>           
       	</select></td></tr>
       		
       		<tr><td>Select a Cinema</td><td>
			    <select name="cinema">
			        <?php
			                while($cinemarr=mysql_fetch_row($results2))
			                     echo"<option value='$cinemarr[0]'>$cinemarr[0]</option>";
			          ?>           
       	</select></td></tr>
       	<tr><td>Disabled</td><td>Yes<input type="radio" name="disabled" value="y" <?php if($dis=='y')echo "checked" ?>/>No<input type="radio" name="disabled" value="n" <?php if($dis=='n')echo "checked" ?>/><?php if ($dErr) echo "Select an option" ?></td></tr>
       	
       	<tr><td>Date</td><td><input type="text" name="bDate" size="10" value="<?php echo $today ?>"readonly/></td></tr>
		<tr><td>No Of Tickets</td><td><input type="text" name="num" size="10" value='<?php echo $num?>'/><?php if ($numErr) echo "Enter Number of Tickets" ?></td></tr>  
		<tr><td colspan="2"><input type="submit" name="submit" value="Make Booking"/></td></tr>   
		 	
		</table>
		</form>
		
		
		<?php
		     if(isset($_POST["submit"]))
		      {
				
				$res=mysql_query("select capacity from Cinema where CName='$_POST[cinema]'");
				$total=mysql_fetch_row($res);
				
				if($total[0]<$_POST["num"])
				    echo "Fully Booked";
				else
				if($bidErr||$numErr||$dErr)
				   echo "Please complete Fields";
				else   
				{
					$sql="INSERT INTO Booking VALUES('$_POST[bid]','$_POST[movie]','$_POST[cinema]','$_POST[bDate]','$_POST[disabled]','$_POST[num]')";
					if(mysql_query($sql))
					   echo "record inserted";
					 else
					   echo "Could not insert".mysql_error();  
				}
				mysql_close($con);    
			}
	?>
	</body>
</html>			   									       