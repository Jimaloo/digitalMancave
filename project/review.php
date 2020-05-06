<?php
// Include config file
require_once "config.php";
 
// Define variables and initialize with empty values
$staffName = $comment = $rating = "";
$staffName_err = $comment_err = $rating_err = "";

 
// Processing form data when form is submitted
if($_SERVER["REQUEST_METHOD"] == "POST"){
    
    // Validate comment
    $input_comment = trim($_POST["comment"]);
    if(empty($input_comment)){
        $comment_err = "Please enter a comment.";     
    } else{
        $comment = $input_comment;
    }
	
   // Validate rating
    $input_rating = trim($_POST["rating"]);
    if(empty($input_rating)){
        $rating_err = "Please enter the rating.";     
    } else{
        $rating = $input_rating;
    }
	
	 // Validate service
	 $input_staffName = trim($_POST["staffName"]);
    if(empty($input_staffName)){
        $staffName_err = "Please enter the StaffName.";
    
    } else{
        $staffName = $input_staffName;
    }
    
    // Check input errors before inserting in database
    if(empty($staffName_err) && empty($comment_err) && empty($rating_err)){
        // Prepare an insert statement
        $sql = "INSERT INTO review (staffName, comment, rating) VALUES (?, ?, ?)";
         
        if($stmt = mysqli_prepare($link, $sql)){
            // Bind variables to the prepared statement as parameters
            mysqli_stmt_bind_param($stmt, "sss", $param_staffName, $param_comment, $param_rating);
            
            // Set parameters
            $param_staffName = $staffName;
            $param_comment = $comment;
            $param_rating = $rating;
            
            // Attempt to execute the prepared statement
            if(mysqli_stmt_execute($stmt)){
                // Records created successfully. Redirect to landing page
                header("location: reviewDisplay.php");
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
 
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Feedback</title>
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
                        <h2>Feedback</h2>
                    </div>
                    <p>Please fill this form and submit to give a review on the services offered.</p>
                    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
                        <div class="form-group <?php echo (!empty($staffName_err)) ? 'has-error' : ''; ?>">
                            <label>staffName</label>
                            <input type="text" name="staffName" class="form-control" value="<?php echo $staffName; ?>">
                            <span class="help-block"><?php echo $staffName_err;?></span>
                        </div>
						
                        <div class="form-group <?php echo (!empty($comment_err)) ? 'has-error' : ''; ?>">
                            <label>comment</label>
                            <textarea name="comment" class="form-control"><?php echo $comment; ?></textarea>
                            <span class="help-block"><?php echo $comment_err;?></span>
                        </div>
						
                        <div class="form-group <?php echo (!empty($rating_err)) ? 'has-error' : ''; ?>">
                            <label>rating (out of 10)</label>
                            <input type="text" name="rating" class="form-control" value="<?php echo $rating; ?>">
                            <span class="help-block"><?php echo $rating_err;?></span>
                        </div>
                        <input type="submit" class="btn btn-primary" value="Submit">
                        <a href="index.php" class="btn btn-default">Cancel</a>
                    </form>
                </div>
            </div>        
        </div>
    </div>
</body>
</html>


