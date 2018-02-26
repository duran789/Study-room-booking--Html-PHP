<?php
	
	$con=mysql_connect("localhost","root","");
	
	if(!$con)
	{
		die('Could not connect'.mysql_error());
	}
	
	$sql1="CREATE DATABASE Dutbooking01";
	
	if(mysql_query($sql1,$con))
	{
		echo "Dutbooking01 database created </br>";
	}
	else
	{
		echo "Error creating database </br>".mysql_error();
	}
	
	
	
	
	mysql_select_db("Dutbooking01",$con);
	
	
	

	$sql2="CREATE TABLE users (
		   id int(11) NOT NULL AUTO_INCREMENT,
		   studentno varchar(8) NOT NULL,
		   username varchar(50) NOT NULL,
		   name varchar(50) NOT NULL,
		   cell varchar(12) NOT NULL,
		   email varchar(50) NOT NULL,
		   password varchar(50) NOT NULL,
		   trn_date datetime NOT NULL,
		   
		   PRIMARY KEY(id))";
			
	if(mysql_query($sql2,$con))
	{
		echo "Users Information table created </br>";
	}
	else
	{
		echo "Error creating table Car Information </br>".mysql_error();
	}
	
	
	
	$sql5="CREATE TABLE location (
		   LocationID varchar(10) NOT NULL,
		   campus varchar(10) NOT NULL,
		   Description varchar(50) NOT NULL,
	 		PRIMARY KEY (`LocationID`)
		   )";
			
	if(mysql_query($sql5,$con))
	{
		echo "location created </br>";
	}
	else
	{
		echo "Error creating table location </br>".mysql_error();
	}
	
	
	$sql3="CREATE TABLE room (
 	`Room` int(3) NOT NULL AUTO_INCREMENT,
 	`roomno` varchar(10) NOT NULL,
 	`Location` varchar(10) NOT NULL,
	 PRIMARY KEY (`Room`),
	 FOREIGN KEY(Location) references location(LocationID)
	 )";
			
	if(mysql_query($sql3,$con))
	{
		echo "Location table created </br>";
	}
	else
	{
		echo "Error creating table users </br>".mysql_error();
	}
	
	
	
	
	
	

	
	$sql6="CREATE TABLE bookings (
		   Bookid int(11) NOT NULL AUTO_INCREMENT,
		   Studentno varchar(8) NOT NULL,
		   Room int(3) ,
		   Date date,
		   Time time,
		   keyretrival varchar(3),
		   PRIMARY KEY(Bookid),
		   FOREIGN KEY(Studentno) references users(studentno),
		   FOREIGN KEY(Room) references room(Room))";
			
	if(mysql_query($sql6,$con))
	{
		echo "bookings Request table created </br>";
	}
	else
	{
		echo "Error creating table bookings </br>".mysql_error();
	}
	
	
	$sql7="INSERT INTO location VALUES
		  ('biko01','Steve Biko	','Library floor 1'),
		  ('ml01','Ml Sultan','Library floor 2')";
		  
	if(mysql_query($sql7,$con))
	{
		echo "Inserted data in location table </br>";
	}
	else
	{
		echo "Error inserting data </br>";
	}
	
	
	
	
	
	$sql8="INSERT INTO room VALUES
		  (1,'lib002','biko01'),
		  (2,'lib003','biko01'),
		  (3,'lib004','biko01'),
		  (4,'lib005','biko01'),
		  (5,'lib006','biko01'),
		  (6,'lib007','biko01'),
		  (7,'lib008','biko01'),
		  (20,'lib002','ml01'),
		  (21,'lib003','ml01'),
		  (22,'lib004','ml01'),
		  (23,'lib005','ml01'),
		  (24,'lib006','ml01'),
		  (25,'lib007','ml01'),
		  (26,'lib008','ml01')";
		  
	if(mysql_query($sql8,$con))
	{
		echo "Inserted data in room table </br>";
	}
	else
	{
		echo "Error inserting data </br>";
	}
	
	$sql9="INSERT INTO users VALUES
		  (1,'00000001','Admin','Admin','0839133030','AdminDut@gmail.com','Dut789000','2016-09-04 14:06:31')";
		  
	if(mysql_query($sql9,$con))
	{
		echo "Inserted data in users table </br>";
	}
	else
	{
		echo "Error inserting data </br>";
	}
	

	
	mysql_close($con);
		
?>