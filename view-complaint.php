<html> 
<head>
 <title>Complaint Info</title>
<link rel="stylesheet" href="styles.css">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
	
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>

		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script> 
</head>
 <body>
<?php require_once 'navigation.php'; ?>
<div class="container">
<div class="header">
   <h2>Complaint Info</h2>
</div>

<?php

$page_roles = array('employee');

require_once 'loginCreds.php';
require_once 'checksession.php';

$conn = new mysqli($hn, $un, $pw, $db);
if($conn->connect_error) die($conn->connect_error);

if(isset($_GET['complaintId'])){

$complaintId = $_GET['complaintId'];

$query = "SELECT * FROM complaint where complaintId=$complaintId";

$result = $conn->query($query); 
if(!$result) die($conn->error);

$rows = $result->num_rows;

for($j=0; $j<$rows; $j++)
{
	 
  $row = $result->fetch_array(MYSQLI_ASSOC); 
  	
    echo <<<_END
      <p>Complaint Type: $row[type]</p> 
      <p>Description: $row[description]</p>
      <p>Date & Time: $row[dateTime]</p>  
      
      	
_END;

}

}

 $conn->close();

?>
   
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