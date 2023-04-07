<html> 
<head>
 <title>Maintenance</title>

<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
<link rel="stylesheet" href="styles.css">
		
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script> 
</head>
 <body>
<?php 
$page_roles = array('customer');
 require_once 'checksession.php';
require_once 'navigation.php'; ?>
<div class="container">
<div class="header">
  <h2> Maintenance</h2>
</div>
  <form class="form-horizontal"  method='post',action="maintenance.php">
    <div class="form-group">
      <label class="control-label col-sm-2" for="unit_id">Unit Id:</label>
      <div class="col-sm-4">
        <input type="text" class="form-control" id="unit_id" placeholder="unit Id" name="unit_id">
      </div>
    </div>
    <div class="form-group">
      <label class="control-label col-sm-2" for="issue_date">date:</label>
      <div class="col-sm-4">
        <input type="date" class="form-control" id="issue_date"  name="issue_date">
      </div>
    </div>
    
    <div class="form-group">
      <label class="control-label col-sm-2" for="description">Issue:</label>
      <div class="col-sm-4">
        <textarea id="description" name="description" placeholder="Description" rows="4" cols="50" class="form-control"></textarea>
      </div>
    </div>

    
    
    <div class="form-group">        
      <div class="col-sm-offset-2 col-sm-10">
        <input type="hidden" id="employeeId" name="employeeId" value="1">
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


if(isset($_POST['unit_id'])) 
{
	
	$unitId = $_POST['unit_id'];
	$date = $_POST['issue_date'];
	$issue = $_POST['description'];
        $employeeId = $_POST['employeeId'];
	
	
	
	$query = "INSERT INTO maintenance (unitId, employeeId, date, issue) VALUES ($unitId, $employeeId,'$date','$issue')";
	
	
	$result = $conn->query($query); 
	if(!$result) die($conn->error);
	
	header("Location: unit.php");
	
	
	
	
}


?>

