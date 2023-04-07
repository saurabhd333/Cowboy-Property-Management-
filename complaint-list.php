<html> 
<head>
 <title> Complaint List</title>
<link rel="stylesheet" href="styles.css">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script> 
</head>
 <body>
<?php require_once 'navigation.php'; ?>
<div class="container">
   <div class="header">
    <h2>Complaint List</h2>
    </div> 
 <div class="text-right"><a class= 'btn btn-primary' href= 'complaint.php'>Add Complaint</a></div> <br/>

 <ul class="list-group">
   <?php

$page_roles = array('employee', 'CTO');

require_once 'loginCreds.php';
require_once 'checksession.php';

$conn = new mysqli($hn, $un, $pw, $db);
if($conn->connect_error) die($conn->connect_error);

$query = "SELECT * FROM complaint";

$result = $conn->query($query); 
if(!$result) die($conn->error);

$rows = $result->num_rows;

?>

<table class="table">
    <thead>
      <tr>
        <th>Complaint Id</th>
        <th>Type</th>
        <th>Description</th>
        <th>Date</th>
        <th>Details</th>
      </tr>
    </thead>
    <tbody>

<?php

for($j=0; $j<$rows; $j++)
{
	//$result->data_seek($j); 

	$row = $result->fetch_array(MYSQLI_ASSOC);
echo <<<_END
	
<!--	 <li class="list-group-item text-left"> $row[complaintId] $row[type] $row[description] $row[dateTime] <span class="badge" style ='background-color:white;'></span></li>	   -->
	
    <tr>
     <td>$row[complaintId]</td>
     <td> $row[type]</td>
     <td>$row[description]</td>
     <td>$row[dateTime]</td>
     <td><a href = 'view-complaint.php?complaintId=$row[complaintId]'> details </a></td>
    </tr>

_END;

}

// $conn->close();

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