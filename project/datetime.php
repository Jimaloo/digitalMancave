<?php
$connection = mysqli_connect("localhost","root","");
$db = mysqli_select_db($connection,'registration');

  if (isset($_POST['confirm'])){
	  
	  $staff = $_POST['staff'];
	  $date = $_POST['date'];
	  $time = $_POST['time'];
	  
	  $query = "INSERT INTO dateTime (staff,date,time) VALUES ('$staff','$date','$time')";
	  $query_run = mysqli_query($connection,$query);
	  
	  if($query_run){
		  echo '<script type="text/javacript">alert("Data saved")</script>';
	  }else{
		  echo '<script type="text/javacript">alert("Data is not saved")</script>';
	  }
	
 }
  


?>







<html>
<head>
	<title>Date & Time</title>
	<link rel="stylesheet" type="text/css" href="datetime.css"/>

</head>

<body>
<div id="container">
	<div id= "header">
		<h1>DIGITAL MANCAVE</h1>
	</div>
	<div id="content">
		<div id ="nav">
			<form action="" method="POST">
			<div class ="dTime">
				<h4>Select Staff</h4>
					<input type="radio" id="none" name="staff" value="none">
					<label for="none">No Preference</label><br>
					
					<input type="radio" id="stema" name="staff" value="stema">
					<label for="stema">Stema</label><br>
					
					<input type="radio" id="mahinda" name="staff" value="mahinda">
					<label for="mahinda">Mahinda</label><br>
					
					<input type="radio" id="sean" name="staff" value="sean">
					<label for="sean">Sean</label><br>
					
					<input type="radio" id="shila" name="staff" value="shila">
					<label for="shila">Shilavula</label><br>	
			</div>
			
			
			<div class ="dTime">
				<h4>Select Date</h4>
					<input type="radio" id="monday" name="date" value="monday">
					<label for="none">Monday</label>
					
					<input type="radio" id="tuesday" name="date" value="tuesday">
					<label for="stema">Tuesday</label>
					
					<input type="radio" id="wednesday" name="date" value="wednesday">
					<label for="mahinda">Wednesday</label>
					
					<input type="radio" id="thursday" name="date" value="thursday">
					<label for="sean">Thursday</label>
					
					<input type="radio" id="friday" name="date" value="friday">
					<label for="shila">Friday</label>

					<input type="radio" id="saturday" name="date" value="saturday">
					<label for="shila">Saturday</label>				
			</div>
			
			
			<div class ="dTime">
				<h4>Select Time</h4>
					<input type="radio" id="8:00" name="time" value="8:00am">
					<label for="none">8:00am</label>
					
					<input type="radio" id="9:00" name="time" value="9:00am">
					<label for="stema">9:00am</label>
					
					<input type="radio" id="10:00" name="time" value="10:00am">
					<label for="mahinda">10:00am</label>
					
					<input type="radio" id="11:00" name="time" value="11:00am">
					<label for="sean">11:00am</label>
					
					<input type="radio" id="12:00" name="time" value="12:00pm">
					<label for="shila">12:00pm</label>

					<input type="radio" id="1:00" name="time" value="1:00pm">
					<label for="shila">1:00pm</label>	<br>
					
					<input type="radio" id="2:00" name="time" value="2:00pm">
					<label for="none">2:00pm</label>
					
					<input type="radio" id="3:00" name="time" value="3:00pm">
					<label for="stema">3:00pm</label>
					
					<input type="radio" id="4:00" name="time" value="4:00pm">
					<label for="mahinda">4:00pm</label>
					
					<input type="radio" id="5:00" name="time" value="5:00pm">
					<label for="sean">5:00pm</label>
					
					<input type="radio" id="6:00" name="time" value="6:00pm">
					<label for="shila">6:00pm</label>

					<input type="radio" id="7:00" name="time" value="7:00pm">
					<label for="shila">7:00pm</label>				
			</div>					
			<input type="submit" id="btn" name ="confirm" value="Confirm Booking">			
			</form>
			
		</div>	
		
		<div id="wholepage">
		<h2 id= "summary">SUMMARY</h2>	
			<form id="summary">
				<p>Service: </p>
				<p>Duration: </p>
				<p>Total</p>
				<p>
				 <input type="submit" id="btn" name ="confirm" value="Confirm Booking">
				 <button type="button" id="btn"><a href="index.php"> Change booking</a></button>
				</p>
			</form>
		</div>
	</div>
</div>	
<div id="footer">
	Copyright &copy; 2020 Juma Jim Aloo.
</div>
</body>



</html>