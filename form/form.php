<?php
// Include config file
require_once "config.php";
 
// Define variables and initialize with empty values
$name = $email=$city = $phone = $street=$org=$password = $confirm_password ="";
$name_err = $email_err=$city_err=$phone_err = $org_err = $street_err=$password_err = $confirm_password_err = "";
 
// Processing form data when form is submitted
if($_SERVER["REQUEST_METHOD"] == "POST"){
    // Validate name
    $input_name = trim($_POST["name"]);
    if(empty($input_name)){
        $name_err = "Please enter a name.";
    }
 elseif(!filter_var($input_name, FILTER_VALIDATE_REGEXP, array("options"=>array("regexp"=>"/^[a-zA-Z0-9 ]+$/")))){
        $name_err = "Please enter a valid name.";
    }
elseif(strlen($input_name)>=21)
{
 $name_err = "Please enter a name(maximum 20 Character).";
} 
else{
        $name = $input_name;
    }

   // Validate Organization
    $input_org = trim($_POST["org"]);
    if(empty($input_org)){
        $org_err = "Please enter a Organization Name.";
    }
 elseif(!filter_var($input_org, FILTER_VALIDATE_REGEXP, array("options"=>array("regexp"=>"/^[a-zA-Z0-9 ]+$/")))){
        $org_err = "Please enter a Organization Name.";
    }
else{
        $org = $input_org;
    }


//email
    $input_email = trim($_POST["email"]);
    if(empty($input_email)){
        $email_err = "Please enter a You email.";
    }


elseif (!filter_var($input_email, FILTER_VALIDATE_EMAIL)) {
  $email_err = "Invalid email format";
}
 else{
        $email = $input_email;
    }

    
    // Validate address
    $input_city = trim($_POST["city"]);
    if(empty($input_city)){
        $city_err = "Please enter an City address.";     
    } else{
        $city = $input_city;
    }
    
    // Validate mobile
    $input_phone = trim($_POST["phone"]);
    if(empty($input_phone)){
        $phone_err = "Please enter the  Mobile Number.";     
    } elseif(!ctype_digit($input_phone)){
        $phone_err = "Please enter a positive integer value.";
    } 
elseif(strlen($input_phone)!=10)
{
 $phone_err = "Please enter a phone number(maximum 10 digit).";
} 
else{
        $phone = $input_phone;
    }

   // Validate note
    $input_street = trim($_POST["street"]);
    if(empty($input_street)){
        $street_err = "Please enter a Street.";
    } elseif(!filter_var($input_street, FILTER_VALIDATE_REGEXP, array("options"=>array("regexp"=>"/^[a-zA-Z\s]+$/")))){
        $street_err = "Please enter a Street Address.";
    } 

elseif(strlen($input_street)>=51)
{
 $street_err = "Please enter a Note(maximum 50 Character).";
} 
else{
        $street = $input_street;
    }

  // Validate password
    if(empty(trim($_POST["password"]))){
        $password_err = "Please enter a password.";     
    } elseif(strlen(trim($_POST["password"])) < 6){
        $password_err = "Password must have atleast 6 characters.";
    } else{
        $password = trim($_POST["password"]);
    }
    
    // Validate confirm password
    if(empty(trim($_POST["confirm_password"]))){
        $confirm_password_err = "Please confirm password.";     
    } else{
        $confirm_password = trim($_POST["confirm_password"]);
        if(empty($password_err) && ($password != $confirm_password)){
            $confirm_password_err = "Password did not match.";
        }
    }
    
    // Check input errors before inserting in database
    if(empty($name_err) && empty($email_err))
	{
        // Prepare an insert statement
        $sql = "INSERT INTO form (name,org,street,city,phone,email,password) VALUES (?, ?, ?,?,?,?,?)";
         
      if($stmt = mysqli_prepare($link, $sql))
		{
            // Bind variables to the prepared statement as parameters
            mysqli_stmt_bind_param($stmt, "sssssss", $param_name,$param_org,$param_street,$param_city, $param_phone, $param_email,$param_password);
            
            // Set parameters
            $param_name = $name;
			$param_org=$org;
			$param_street=$street;
			$param_city=$city;
            $param_phone = $phone;
            $param_email = $email;
          
           
            $param_password = password_hash($password, PASSWORD_DEFAULT); // Creates a password hash
            // Attempt to execute the prepared statement
            if(mysqli_stmt_execute($stmt))
			{
                // Records created successfully. Redirect to landing page
				header("location: login.php");
                exit();
            } 
			else
			{
                echo "Something went wrong. Please try again later.";
            }
        }
			
			else 
			{
				echo "Something's wrong with the query: " . mysqli_error($link);
			}
         
        // Close statement
        mysqli_stmt_close($stmt);
    }
      #mysqli_stmt_close($stmt);
    // Close connection
	
    mysqli_close($link);
}
?>
 
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
                        <h2>Registration Form</h2>
                    </div>
                    <p>Please fill this form and submit to add record to the database.</p>
                    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">

                        <div class="form-group <?php echo (!empty($name_err)) ? 'has-error' : ''; ?>">
                            <label>Name</label>
                            <input type="text" name="name" class="form-control" value="<?php echo $name; ?>">
                            <span class="help-block"><?php echo $name_err;?></span>
                        </div>
 			<div class="form-group <?php echo (!empty($org_err)) ? 'has-error' : ''; ?>">
                            <label>Organization</label>
                            <input type="text" name="org" class="form-control" value="<?php echo $org; ?>">
                            <span class="help-block"><?php echo $org_err;?></span>
                        </div>
			
			<div class="form-group <?php echo (!empty($street_err)) ? 'has-error' : ''; ?>">
                            <label>Street</label>
                            <input type="text" name="street" class="form-control" value="<?php echo $street; ?>">
                            <span class="help-block"><?php echo $street_err;?></span>
                        </div>
 			
                        <div class="form-group <?php echo (!empty($city_err)) ? 'has-error' : ''; ?>">
                            <label>City Address</label>
                            <textarea name="city" class="form-control"><?php echo $city; ?></textarea>
                            <span class="help-block"><?php echo $city_err;?></span>
                        </div>
                     

			 <div class="form-group <?php echo (!empty($phone_err)) ? 'has-error' : ''; ?>">
                            <label>Phone Number</label>
                            <input type="text" name="phone" class="form-control" value="<?php echo $phone; ?>">
                            <span class="help-block"><?php echo $phone_err;?></span>
                        </div>
			<div class="form-group <?php echo (!empty($email_err)) ? 'has-error' : ''; ?>">
                            <label>Email</label>
                            <input type="text" name="email" class="form-control" value="<?php echo $email; ?>">
                            <span class="help-block"><?php echo $email_err;?></span>
                        </div>
			   <div class="form-group <?php echo (!empty($password_err)) ? 'has-error' : ''; ?>">
                <label>Password</label>
                <input type="password" name="password" class="form-control" value="<?php echo $password; ?>">
                <span class="help-block"><?php echo $password_err; ?></span>
            </div>
            <div class="form-group <?php echo (!empty($confirm_password_err)) ? 'has-error' : ''; ?>">
                <label>Confirm Password</label>
                <input type="password" name="confirm_password" class="form-control" value="<?php echo $confirm_password; ?>">
                <span class="help-block"><?php echo $confirm_password_err; ?></span>
            </div>
				  <div class="form-group">
                <input type="submit" class="btn btn-primary" value="Submit">
                <input type="reset" class="btn btn-default" value="Reset">
            </div>
            <p>Already have an account? <a href="login.php">Login here</a>.</p>
<p>Don't create an account, back to Home? <a href="">Home</a>.</p>

			
                    </form>
                </div>
            </div>        
        </div>
    </div>


<script>

function myFunction() {
  var x = document.getElementById("myDIV");
  if (x.style.display === "none") {
    x.style.display = "block";
  } else {
    x.style.display = "none";
  }
}

</script>
</body>
</html>