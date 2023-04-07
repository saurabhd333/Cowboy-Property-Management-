<html> 
<head>
 <title>Add Customer</title>
 <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
 <link rel="stylesheet" href="styles.css">
 <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
 <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script> 
</head>
<body>
 <?php require_once 'navigation.php'; ?>
  <div class="container">
    <div class="header">
      <h2>Add Customer</h2>
    </div>
    <form class="form-horizontal"  method='post',action="add-customer.php">
      <div class="form-group">
        <label class="control-label col-sm-2" for="f_name">First Name:</label>
        <div class="col-sm-4">
          <input type="text" class="form-control" id="f_name" placeholder="First Name" name="f_name">
        </div>
      </div>
      <div class="form-group">
        <label class="control-label col-sm-2" for="l_name">Last Name:</label>
        <div class="col-sm-4">
          <input type="text" class="form-control" id="l_name" placeholder="Last Name" name="l_name">
        </div>
      </div>
      <div class="form-group">
        <label class="control-label col-sm-2" for="username">username:</label>
        <div class="col-sm-4">
          <input type="text" class="form-control" id="username" placeholder="Username" name="username">
        </div>
      </div>
      <div class="form-group">
        <label class="control-label col-sm-2" for="email">Email:</label>
        <div class="col-sm-4">
          <input type="email" class="form-control" id="email" placeholder="Enter email" name="email">
        </div>
      </div>

      <div class="form-group">
        <label class="control-label col-sm-2" for="password">Password:</label>
        <div class="col-sm-4">
          <input type="password" class="form-control" id="password" placeholder="Password" name="password">
        </div>
      </div>

      <div class="form-group">
        <label class="control-label col-sm-2" for="phone">Phone:</label>
        <div class="col-sm-4">
          <input type="text" class="form-control" id="phone" placeholder="Phone" name="phone">
        </div>
      </div>
      <div class="form-group">
        <label class="control-label col-sm-2" for="dob">Birthday:</label>
        <div class="col-sm-4">
          <input type="date" class="form-control" id="dob"  name="dob">
        </div>
      </div>
      
      <div class="form-group">        
        <div class="col-sm-offset-2 col-sm-10">
          <button type="submit" class="btn btn-default">Submit</button>
        </div>
      </div>
    </form>
  </div>
 
<div class='footer'>
  <br>	
	<a href="landing.php">
	  <img height='100' width='100' src='images/boot-logo.png'></img>
	</a>
	  <br>
	  <br>
	  Copyright Cowboy Property Management 2022
	</div> 
 
 </body>
 </html>

<?php
require_once 'loginCreds.php';
$conn = new mysqli($hn, $un, $pw, $db);
if($conn->connect_error) die($conn->connect_error);


if(isset($_POST['f_name'])) 
{
	
	$firstName = $_POST['f_name'];
	$lastName = $_POST['l_name'];
	$dOB = $_POST['dob'];
	$phone = $_POST['phone'];
  $email = $_POST['email'];
  $username = $_POST['username'];
  $password = password_hash($_POST['password'], PASSWORD_DEFAULT);
	
	
	
	$query = "INSERT INTO customer (firstName, lastName, dOB, phone,email) VALUES ('$firstName', '$lastName','$dOB', '$phone','$email')";
  
	
	
	$result = $conn->query($query); 
  if(!$result) die($conn->error);
  
  $query1 = "select customerId from customer where email= '$email'";
  $result1 = $conn->query($query1); 
  if(!$result1) die($conn->error);

  $rows = $result1->num_rows;

   for($j=0; $j<$rows; $j++)
    {
	    //$result->data_seek($j); 

      $row = $result1->fetch_array(MYSQLI_ASSOC);

      $query2 = "INSERT INTO website_user (customerId, username, password, firstName, lastName, userStatus) VALUES ($row[customerId],'$username', '$password','$firstName', '$lastName','active')";
      $query3 = "INSERT INTO roles (username, role) VALUES ('$username', 'customer')";
      $result2 = $conn->query($query2);
      $result3 = $conn->query($query3);
      if(!$result2) die($conn->error);
      if(!$result3) die($conn->error);

    }
      
	header("Location: renters-list.php");
	
	
	
	
}


?>

