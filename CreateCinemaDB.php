<?php
      $con=mysql_connect("localhost","root","");
      if(!$con)
        die("Could not connect".mysql_error());
        
      if(mysql_query("CREATE DATABASE Cinema_DB",$con))
	     echo "database created<br/>";
	  else
	     echo(mysql_error());
		 
	  mysql_select_db("Cinema_DB",$con);
	  
	  $sql="CREATE TABLE Movies
	        ( 
	           MName varchar(30) PRIMARY KEY,
	           Type varchar(20),
	           age varchar(10),
	           Duration varchar(10))";
	 if(mysql_query($sql,$con))
	    echo "Table created";
	 else
	     echo "Could not create table Movies<br/>".mysql_error();
		 
	$sql="CREATE TABLE Cinema
		(
           CName varchar(20) PRIMARY KEY,
		   capacity int(4),
		   price float(4))";
	 if(mysql_query($sql,$con))
	    echo "Table created";
	 else
	     echo "Could not create table Cinema<br/>".mysql_error();	   
	
	$sql="CREATE TABLE Booking
		(
		   BID varchar(10) PRIMARY KEY,
		   MName varchar(30),
		   CName varchar(20),
		   BDate Date,
		   Disabled char,
		   NumBooked int(2),
		   FOREIGN KEY(MName)references Movies(MName),
		   FOREIGN KEY(CName)references Cinema(CName))";
		   
		  if(mysql_query($sql,$con))
	    echo "Table created";
	 else
	     echo "Could not create table Booking<br/>".mysql_error();
	     
	 $sql="INSERT INTO Movies values
	       ('Minions','Animation','PG','101 mins'),
		   ('Fatastic 4','Fantasy','10LV','120 mins'),
		   ('Boychoir','Drama','PG','109 mins'),
		   ('The man from U.N.C.L.E','Action','13V','109 mins')";    
	     
	     
		 if(mysql_query($sql,$con))
		    echo "data inserted";
		else
		    echo "could not insert data".mysql_error();  
		    
		    
	 $sql="INSERT INTO Cinema values
	       ('Prestige',50,150.0),
		   ('Nouveau',120,95.0),
		   ('IMax',100,75.0),
		   ('Cine',350,40.0)";    
	     
	     
		 if(mysql_query($sql,$con))
		    echo "data inserted";
		else
		    echo "could not insert data".mysql_error();  
		    
		    
	mysql_close($con);		  
	?>