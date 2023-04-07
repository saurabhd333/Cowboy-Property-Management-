<html> 
<head>
 <title>Renters List</title>
<link rel="stylesheet" href="styles.css">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">

		
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>

		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script> 
</head>
 <body>
<?php require_once 'navigation.php'; ?>
<div class="container">
   <div class="header">
        
        <h2>Renters List</h2>
    </div> 
 <div class="text-right"><a class= 'btn btn-primary custom-btn' href= 'add-customer.php'>Add Customer</a></div> <br/>	
  <ul class="list-group">
   <?php

$page_roles = array('employee');

require_once 'loginCreds.php';
require_once 'checksession.php';

$conn = new mysqli($hn, $un, $pw, $db);
if($conn->connect_error) die($conn->connect_error);

$query = "SELECT * FROM customer";

$result = $conn->query($query); 
if(!$result) die($conn->error);

$rows = $result->num_rows;

for($j=0; $j<$rows; $j++)
{
	//$result->data_seek($j); 

	$row = $result->fetch_array(MYSQLI_ASSOC);
echo <<<_END
	
	 <li class="list-group-item text-left">$row[firstName] $row[lastName] <span class="badge" style ='background-color:white;'><a href = 'renter-info.php?cust_id=$row[customerId]'> details</a></span></li>	
	
_END;

}

$conn->close();

?>


</ul>


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