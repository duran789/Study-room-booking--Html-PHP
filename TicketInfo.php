<html>
<link rel="stylesheet" type="text/css" href="styles.css" />
<?php
       $con=mysql_connect("localhost","root","");
      if(!$con)
        die("Could not connect".mysql_error());
        mysql_select_db("Cinema_DB");
        $results=mysql_query("select * from Booking");
?>


<body>
       <form action="TicketInfo.php" method="post">
	   <h1>Ticket </h1>
	   <table>
        <tr><td>Select Booking ID</td><td>
			    <select name="bid">
			        <?php
			                while($arr=mysql_fetch_row($results))
			                     echo"<option value='$arr[0]'>$arr[0]</option>";
			          ?>           
       	</select></td>
       	<td><input type ="submit" name="submit"/></td></tr>
       	
       	</table>
       	</form>
       	
       	<?php
       	      if(isset($_POST["submit"]))
       	      
       	      {
					mysql_select_db("Cinema_DB");
					$sq="select * from Booking where BID ='$_POST[bid]'";
					
					if($res=mysql_query($sq))
					{
					
					echo "<form action ='TicketInfo.php' method='post'>";
					
					while($arr=mysql_fetch_row($res))
					{
						if($arr[4]=='y')
						  $ans="Disabled";
						else
						  $ans="Not Disabled";  
						  
						if($arr[2]=="Prestige")  
						  $price=150;
						else if($arr[2]=="Nouveau") 
						  $price=95;
						else if($arr[2]=="IMax") 
						  $price=75;
						else
						  $price=40;
						 
						 $tot=$arr[5]*$price;     
						  
						echo "Movie Name <input type='text' size='10' value='$arr[1]'/><br/><br/> Cinema <input type='text' size='10' value='$arr[2]'/><br/><br/> $ans<br/><br/>Number of Tickets <input type='text' size='5' value='$arr[5]'/><br/><br/><h3>Total cost for booking is R$tot</h3>";
						
					}
					echo "</form>";
					
				  }
       
       	}
     ?>	
       	
   </body>
   </html>    	