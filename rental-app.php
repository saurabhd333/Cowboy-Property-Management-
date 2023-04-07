<html> 
<head>
 <title>Rental Application</title>

<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
<link rel="stylesheet" href="styles.css">

		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>

		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script> 
</head>
 <body>
<?php
$page_roles = array('customer');
require_once 'navigation.php';
require_once 'checksession.php';
?>
<div class="container">
<div class="header">
  <h2>Rental Application</h2>
</div>
  <form class="form-horizontal"  method='post' action="rental-app.php">

    <div class="form-group">
      <label class="control-label col-sm-2" for="f_name">Full Name:</label>
      <div class="col-sm-4">
        <input type="text" class="form-control" id="f_name" placeholder="First Name" name="f_name">
      </div>
    </div>

    <div class="form-group">
      <label class="control-label col-sm-2" for="cid">Customer Id:</label>
      <div class="col-sm-4">
        <input type="text" class="form-control" id="cid" placeholder="Customer Id" name="cid">
      </div>
    </div>

    <div class="form-group">
      <label class="control-label col-sm-2" for="phone">Phone:</label>
      <div class="col-sm-4">
        <input type="text" class="form-control" id="phone" placeholder="Phone" name="phone">
      </div>
    </div>

    <div class="form-group">
      <label class="control-label col-sm-2" for="email">Email:</label>
      <div class="col-sm-4">
        <input type="email" class="form-control" id="email" placeholder="Enter email" name="email">
      </div>
    </div>

    <div class="form-group">
      <label class="control-label col-sm-2" for="dob">Birth Date:</label>
      <div class="col-sm-4">
        <input type="date" class="form-control" id="dob" name="dob">
      </div>
    </div>

    <div class="form-group">
      <label class="control-label col-sm-2" for="utype">Unit Type:</label>
      <div class="col-sm-4">
        <input type="text" class="form-control" id="utype" placeholder="Unit Type" name="utype">
      </div>
    </div>

    <div class="form-group">
      <label class="control-label col-sm-2" for="l_date">Lease Start Date:</label>
      <div class="col-sm-4">
        <input type="date" class="form-control" id="l_date" placeholder="Lease Start Date" name="l_date">
      </div>
    </div>

    <div class="form-group">
      <label class="control-label col-sm-2" for="leaseid">Lease ID:</label>
      <div class="col-sm-4">
        <input type="text" class="form-control" id="leaseid" placeholder="Lease ID" name="leaseid">
      </div>
    </div>
    
    <div class="form-group">
      <label class="control-label col-sm-2" for="status">Status:</label>
      <div class="col-sm-4">
        <input type="text" class="form-control" id="status" placeholder="Status" name="status">
      </div>
    </div>

    <div class="form-group">        
      <div class="col-sm-offset-2 col-sm-1">
        <button type="submit" class="btn btn-default" onclick="alert('Thank You! Your Application submitted successfully!')">Submit</button>
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

if(isset($_POST['cid'])) 
{
	
	$customerId = $_POST['cid'];
	$date = $_POST['l_date'];
	$leaseId = $_POST['leaseid'];
    $status = $_POST['status'];
    $unitType = $_POST['utype'];
	
	$query = "INSERT INTO application (customerId, date, leaseId, status, unitType) VALUES ('$customerId', '$date','$leaseId', '$status','$unitType')";
	
	
	$result = $conn->query($query); 
	if(!$result) die($conn->error);
	
	//header("Location: landing.php");
	
}

?>
