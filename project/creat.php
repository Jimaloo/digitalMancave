<?php
// Include config file
require_once "config.php";
 
// Define variables and initialize with empty values
$service = $duration = $price = "";
/*$service_err = $duration_err = $price_err = "";
 
// Processing form data when form is submitted
if($_SERVER["REQUEST_METHOD"] == "POST"){
    // Validate service
    $input_service = trim($_POST["service"]);
    if(empty($input_service)){
        $service_err = "Please enter a service.";
    } elseif(!filter_var($input_service, FILTER_VALIDATE_REGEXP, array("options"=>array("regexp"=>"/^[a-zA-Z\s]+$/")))){
        $service_err = "Please enter a valid service.";
    } else{
        $service = $input_service;
    }
    
    // Validate duration
    $input_duration = trim($_POST["duration"]);
    if(empty($input_duration)){
        $duration_err = "Please enter a duration.";     
    } else{
        $duration = $input_duration;
    }
    
   // Validate price
    $input_price = trim($_POST["price"]);
    if(empty($input_price)){
        $price_err = "Please enter the price amount.";     
    } elseif(!ctype_digit($input_price)){
        $price_err = "Please enter a positive integer value.";
    } else{
        $price = $input_price;
    }
    
    // Check input errors before inserting in database
    if(empty($service_err) && empty($duration_err) && empty($price_err)){
        // Prepare an insert statement
        $sql = "INSERT INTO services (service, duration, price) VALUES (?, ?, ?)";
         
        if($stmt = mysqli_prepare($link, $sql)){
            // Bind variables to the prepared statement as parameters
            mysqli_stmt_bind_param($stmt, "sss", $param_service, $param_duration, $param_price);
            
            // Set parameters
            $param_service = $service;
            $param_duration = $duration;
            $param_price = $price;
            
            // Attempt to execute the prepared statement
            if(mysqli_stmt_execute($stmt)){
                // Records created successfully. Redirect to landing page
                header("location: dashboard.php");
                exit();
            } else{
                echo "Something went wrong. Please try again later.";
            }
        }
         
        // Close statement
        mysqli_stmt_close($stmt);
    }
    
    // Close connection
    mysqli_close($link);
}
?>
 */
 
if (isset($_POST['submit'])) {
	//die(print_r($_POST);
  $service = mysqli_real_escape_string($db, $_POST['service']);
  $price = mysqli_real_escape_string($db, $_POST['price']);
  $duration = mysqli_real_escape_string($db, $_POST['duration']);
  
  
  if (empty($service)) { array_push($errors, "Service is required"); }
  if (empty($price)) { array_push($errors, "Price is required"); }
  if (empty($duration)) { array_push($errors, "Duration is required"); }
  
  $user_check_query = "SELECT * FROM services WHERE service='$service'";
  $result = mysqli_query($db, $user_check_query);
  $user = mysqli_fetch_assoc($result);
  
   if ($user) { // if user exists
    if ($user['service'] === $service) {
      array_push($errors, "service already exists");
    }
	
	
  if (count($errors) == 0) {
	  $query = "INSERT INTO services (service, price,duration) 
  			  VALUES('$service','$price','$duration')";
	mysqli_query($db, $query);
		
		header('location: dashboard.php');
  }
}
}

 
 
 
 
 
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Create Record</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.css">
    <style type="text/css">
        .wrapper{
            width: 500px;
            margin: 0 auto;
        }
    </style>
</head>
<body>
    <div class="wrapper">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="page-header">
                        <h2>Create Record</h2>
                    </div>
                    <p>Please fill this form and submit to add services to the database.</p>
                    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
                        <div class="form-group <?php echo (!empty($service_err)) ? 'has-error' : ''; ?>">
                            <label>service</label>
                            <input type="text" name="service" class="form-control" value="<?php echo $service; ?>">
                            <span class="help-block"><?php echo $service_err;?></span>
                        </div>
                        <div class="form-group <?php echo (!empty($duration_err)) ? 'has-error' : ''; ?>">
                            <label>duration</label>
                            <textarea name="duration" class="form-control"><?php echo $duration; ?></textarea>
                            <span class="help-block"><?php echo $duration_err;?></span>
                        </div>
                        <div class="form-group <?php echo (!empty($price_err)) ? 'has-error' : ''; ?>">
                            <label>price</label>
                            <input type="text" name="price" class="form-control" value="<?php echo $price; ?>">
                            <span class="help-block"><?php echo $price_err;?></span>
                        </div>
                        <input type="submit" class="btn btn-primary" value="Submit">
                        <a href="dashboard.php" class="btn btn-default">Cancel</a>
                    </form>
                </div>
            </div>        
        </div>
    </div>
</body>
</html>