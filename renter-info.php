<html> 
<head>
 <title>Renter Info</title>
<link rel="stylesheet" href="styles.css">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
		
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script> 
</head>
 <body>
<?php 
$page_roles = array('employee');
 require_once 'checksession.php';
require_once 'navigation.php'; ?>
<div class="container">
<div class="header">
   <h2>Renter Info</h2>
</div>

<?php

require_once  'loginCreds.php';

$conn = new mysqli($hn, $un, $pw, $db);
if($conn->connect_error) die($conn->connect_error);

if(isset($_GET['cust_id'])){

$customerId = $_GET['cust_id'];

$query = "SELECT * FROM customer where customerId=$customerId";

$result = $conn->query($query); 
if(!$result) die($conn->error);

$rows = $result->num_rows;

for($j=0; $j<$rows; $j++)
{
	 
  $row = $result->fetch_array(MYSQLI_ASSOC); 
  $date = date("d M Y", strtotime("$row[dOB]"));
 
	
    echo <<<_END
      <p>First Name: $row[firstName]</p> 
      <p>Last Name: $row[lastName]</p>
      <p>Email: $row[email]</p>  
      <p>Phone: $row[phone]</p> 
      <p>Birthday: $date</p>
      <p> Status : Active </p>
      
      <p> <form class="form-horizontal" action='delete-customer.php' method='post'>
      <div class="form-group" >        
      <div class="col-sm-offset-2 col-sm-10">
        <p class='btn btn-primary custom-btn'><a href='edit-customer.php?cust_id=$customerId'>edit</a></p> 
        
	 <input type='hidden' name='delete' value='yes'>
	 <input type='hidden' name='cust_id' value='$row[customerId]'>
	  <button type="submit" class='btn btn-primary custom-btn'>Delete</button>
	
      </div>
   </div>
  </form>  </p>  
         
	
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