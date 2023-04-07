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
     
        <form class="form-horizontal"  method='post' action="edit-customer.php">
    <div class="form-group">
      <label class="control-label col-sm-2" for="f_name">First Name:</label>
      <div class="col-sm-4">
        <input type="text" class="form-control" id="f_name" value='$row[firstName]' placeholder="First Name" name="f_name">
      </div>
    </div>
    <div class="form-group">
      <label class="control-label col-sm-2" for="l_name">Last Name:</label>
      <div class="col-sm-4">
        <input type="text" class="form-control" id="l_name" value='$row[lastName]'  placeholder="Last Name" name="l_name">
      </div>
    </div>
    <div class="form-group">
      <label class="control-label col-sm-2" for="email">Email:</label>
      <div class="col-sm-4">
        <input type="email" class="form-control" id="email" value='$row[email]' placeholder="Enter email" name="email">
      </div>
    </div>

    <div class="form-group">
      <label class="control-label col-sm-2" for="phone">Phone:</label>
      <div class="col-sm-4">
        <input type="text" class="form-control" id="phone" value='$row[phone]' placeholder="Phone" name="phone">
      </div>
    </div>
    
    <div class="form-group">        
      <div class="col-sm-offset-2 col-sm-10">
       <input type='hidden' name='update' value='yes'>
	<input type='hidden' name='cust_id' value='$row[customerId]'>
        <button type="submit" class="btn btn-default">Update</button>
      </div>
    </div>
  </form>
	
_END;

}

}

if(isset($_POST['update'])){

	$cust_id = $_POST['cust_id'];
        $firstName = $_POST['f_name'];
	$lastName = $_POST['l_name'];
	$phone = $_POST['phone'];
        $email = $_POST['email'];

 
	
	
 $query = "UPDATE customer set firstName='$firstName', lastName ='$lastName', phone ='$phone', email ='$email' where customerId = $cust_id ";
	
  $result = $conn->query($query); 
  if(!$result) die($conn->error);
	
  header("Location: renter-info.php?cust_id=$cust_id");
	
}

$conn->close();



?>