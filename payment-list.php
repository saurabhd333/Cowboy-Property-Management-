<html> 
<head>
 <title>Payment List</title>
<link rel="stylesheet" href="styles.css">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
		
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>

		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script> 
</head>
 <body>
<?php require_once 'navigation.php'; ?>
<div class="container">
   <div class="header">
        
        <h2>Payment List</h2>
    </div> 
    <div class="text-right"><a class= 'btn btn-primary custom-btn' href= 'payment.php'>Add Payment</a></div> <br/>	
 
  <ul class="list-group">

<?php

$page_roles = array('CTO', 'employee', 'customer');

require_once 'loginCreds.php';
require_once 'checksession.php';

$conn = new mysqli($hn, $un, $pw, $db);
if($conn->connect_error) die($conn->connect_error);

if(isset($_SESSION['user']))
{
$user = $_SESSION['user'];
$username = $user->username;
$query2 = "SELECT userId FROM website_user WHERE username = '$username'";
$result2 = $conn->query($query2);
if(!$result2) die($conn->error);
$row2 = mysqli_fetch_array($result2);

$userId = $row2['userId'];
$query3 = "SELECT customerId FROM customer WHERE userId = $userId";
$result3 = $conn->query($query3);
if(!$result3) die($conn->error);
$row3 = mysqli_fetch_array($result3);
if(isset($row3['customerId'])){
$customerId = $row3['customerId'];}

if(!isset($row3['customerId']))
{
$query = "SELECT f.finTranId, e.employeeId, e.firstname, e.lastname, f.amountDue, f.type, f.dueDate 
FROM employee e JOIN financial_transaction f where e.employeeId = f.employeeId";
}
else
{if (isset($row3['customerId'])){
$customerId = $row3['customerId'];}
$query = "SELECT f.finTranId, c.customerId, c.firstname, c.lastname, f.amountDue, f.type, f.dueDate 
FROM customer c JOIN financial_transaction f where (c.customerId = f.customerId) AND (c.customerId = '$customerId')";}

$result = $conn->query($query); 
if(!$result) die($conn->error);

$rows = $result->num_rows;
}
?>

<table class="table">
    <thead>
      <tr>
        <th>Transcation Id</th>
        <th>Employee/Customer Id</th>
        <th>Firstname</th>
        <th>Lastname</th>
        <th>Amount Due</th>
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

if(!isset($row3['customerId'])){
echo <<<_END
	
<!--	 <li class="list-group-item text-left">$row[finTranId] $row[employeeId] $row[firstname] $row[lastname] $row[amountDue] $row[type] $row[dueDate]<span class="badge" style ='background-color:white;'></span></li>	-->

<tr>
    <td>$row[finTranId]</td>
    <td>$row[employeeId]</td>
    <td>$row[firstname]</td>
    <td>$row[lastname]</td>
    <td>$row[amountDue]</td>
    <td>$row[type]</td>
    <td>$row[dueDate]</td>
</tr>


_END;
}
else
{
echo <<<_END
	
<!--	 <li class="list-group-item text-left">$row[finTranId] $row[customerId] $row[firstname] $row[lastname] $row[amountDue] $row[type] $row[dueDate]<span class="badge" style ='background-color:white;'></span></li>	-->

<tr>
    <td>$row[finTranId]</td>
    <td>$row[customerId]</td>
    <td>$row[firstname]</td>
    <td>$row[lastname]</td>
    <td>$row[amountDue]</td>
    <td>$row[type]</td>
    <td>$row[dueDate]</td>
</tr>


_END;
}
}

?>
</tbody>
</table>
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