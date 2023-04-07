<html> 
<head>
 <title> Reports</title>
<link rel="stylesheet" href="styles.css">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script> 
</head>

<body>

<?php require_once 'navigation.php'; ?>
<div class="container">
    <div class="header">
        <h2>Report</h2>
    </div> 
    <div class="text-right"><a class= 'btn btn-primary custom-btn' href= 'maintenance-report.php'>Maintenance Report</a></div>

 <ul class="list-group">

<?php

$page_roles = array('CTO');

require_once 'loginCreds.php';
require_once 'checksession.php';

$conn = new mysqli($hn, $un, $pw, $db);
if($conn->connect_error) die($conn->connect_error);

$query = "SELECT * FROM financial_transaction f JOIN employee e WHERE e.employeeId = f.employeeId";

$result = $conn->query($query); 
if(!$result) die($conn->error);

$rows = $result->num_rows;
?>
<table class="table">
    <thead>
      <tr>
        <th>Transaction Id</th>
        <th>First Name</th>
        <th>Last Name</th>
        <th>Amount Due</th>
        <th>Overdue</th>
        <th>Type</th>
        <th>Due Date</th>
      </tr>
    </thead>
    <tbody>
<?php
for($j=0; $j<$rows; $j++)
{
	//$result->data_seek($j); 

	$row = $result->fetch_array(MYSQLI_ASSOC);

echo <<<_END
		
      <tr>
        <td>$row[finTranId]</td>
        <td>$row[firstName]</td>
        <td>$row[lastName]</td>
        <td>$row[amountDue]</td>
        <td>$row[overdue]</td>
        <td>$row[type]</td>
        <td>$row[dueDate]</td>
      </tr>
      

_END;

}

$conn->close();

?>

</tbody>
</table>
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