 <?php 
  session_start(); 

  if (!isset($_SESSION['username'])) {
  	$_SESSION['msg'] = "You must log in first";
  	header('location: login.php');
  }
  if (isset($_GET['logout'])) {
  	session_destroy();
  	unset($_SESSION['username']);
  	header("location: login.php");
  }
  $service = "";
  $duration = "";
  $total = "";
if(isset($_POST['service'])){ 
  $service = $_POST['cut'];
  $duration = $_POST['duration'];
  $total = $_POST['total'];
 
  $service = ": ".$service;
  $duration = ": ".$duration;
  $total = ": ".$total;
}    
  
?>



<html>
<head>
	<title>Digital ManCave</title>
	<link rel="stylesheet" type="text/css" href="styles.css"/>
	
	

</head>
	<body>
		<div id="container">
			<div id= "header">
				<h1>DIGITAL MANCAVE</h1>
				
			</div>
			
			<div id="content">
				<div id ="nav">
					<h2>Select service</h2>
					<ul>
											
						<li><a href="#">Barbers</a></li>
						<li><a href="#"></a></li>	
						<li><a href="review.php">Reviews</a></li>
					</ul>
	
				</div>
			</div>
			<div id="main">
			<form action="index.php" method="POST"/>
					<h2 id="haircuts">Haircuts</h2>
						
						<form action="" method="POST"/>
						
						   <?php
                    // Include config file
                    require_once "config.php";
                    
                    // Attempt select query execution
                    $sql = "SELECT * FROM services";
                    if($result = mysqli_query($link, $sql)){
                        if(mysqli_num_rows($result) > 0){
                           while($row = mysqli_fetch_array($result)){
                                    echo "<form action='' method='POST'>";
									echo "<div class='serv'>";
                                        echo "<b>" . $row['service'] . "</b><br>";
                                        echo "<span>" . $row['price'] . "</span><br>";
                                        echo "<span>" . $row['duration'] . "</span><br>";
                                       echo "<a href='summary.php?id=". $row['id']."'><input  type='button' id='btn'  class='btnbtn-primary' name='service[]' value='Add' /></a></span>";
									echo "</div>";
                                    echo "</form>";
                                }
                               // Free result set
                            mysqli_free_result($result);
                        } else{
                            echo "<p class='lead'><em>No records were found.</em></p>";
                        }
                    } else{
                        echo "ERROR: Could not able to execute $sql. " . mysqli_error($link);
                    }
 
                    // Close connection
                    mysqli_close($link);
                    ?>
					
						</form>	
				</div>
				
			<h2 id= "summary">SUMMARY</h2>
			<div id="wholepage">
				
			
				<form id="summary">
				<div class="dropdown">
				  <button class="dropbtn">Users</button>
				  <div class="dropdown-content">
					<a href="dashboard.php">Admin</a>
					<a href="#" value="logout">Logout</a>
					
				  </div>
				</div>
				<!--
					<p>Service: <?php echo $service; ?> </p>
					<p>Duration: <?php echo $duration; ?> </p>
					<p>Total: <?php echo $total; ?></p>
					<p>
					 <button type="submit" id="btn" value="pickdate"> <a href="datetime.php">Pick date</a></button>
					 </p>
						
				-->
				</form>
			
			</div>

			</div>
			
			<div id="footer">
				Copyright &copy; 2020 Juma Jim Aloo.
			</div>
		</div>
	</body>
 



</html>