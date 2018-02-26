<html>
<link rel="stylesheet" type="text/css" href="styles.css" />
<?php
       $con=mysql_connect("localhost","root","");
      if(!$con)
        die("Could not connect".mysql_error());
        mysql_select_db("Cinema_DB");
        $results1=mysql_query("select * from Movies");
?>


<body>
       <form action="MovieDetails.php" method="post">
	   <h1>View Movie Details </h1>
	   <table>
        <tr><td>Select a Movie</td><td>
			    <select name="movie">
			        <?php
			                while($moviearr=mysql_fetch_row($results1))
			                     echo"<option value='$moviearr[0]'>$moviearr[0]</option>";
			          ?>           
       	</select></td>
       	<td><input type ="submit" name="submit"/></td></tr>
       	
       	</table>
       	
       	<?php
       	      if(isset($_POST["submit"]))
       	      {
       	          mysql_select_db("Cinema_DB");
       	          $query="select * from Movies where MName='$_POST[movie]'";
       	          if($result=mysql_query($query))
       	          {
			echo "<table border=2 width =40%><tr><th>Movie Title</th><th>Classification</th><th>Age Restriction</th><th>Duration</th></tr>";
						while($movieArr=mysql_fetch_row($result))
						{
							echo"<tr>
							<td>$movieArr[0]</td>
							<td>$movieArr[1]</td>
							<td>$movieArr[2]</td>
							<td>$movieArr[3]</td>
							</tr>";
						}
						echo"</table>";	
					}
					else
					mysql_error();
				}
					
				
		?>
     </form>  	
 </body>
 </html> 	