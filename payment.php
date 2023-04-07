<html>
    <head>
        <title>Payment Page</title>
        <link rel="stylesheet" href="styles.css">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>

		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script> 
    </head>

<body>
<?php 
$page_roles = array('CTO', 'customer');
require_once 'checksession.php';
require_once 'navigation.php'; ?>
<div class="container">
  <div class="header">
  <h2>Submit Payment</h2>
  </div>

  <form class="form-horizontal" method='post' action="payment.php">

  <div class="form-group">
      <label class="control-label col-sm-2" for="empid">Employee ID:</label>
      <div class="col-sm-4">
        <input type="text" class="form-control" id="empid" placeholder="Employee ID" name="empid">
      </div>
    </div>

    <div class="form-group">
      <label class="control-label col-sm-2" for="custid">Customer ID:</label>
      <div class="col-sm-4">
        <input type="text" class="form-control" id="custid" placeholder="Customer ID" name="custid">
      </div>
    </div>

    <div class="form-group">
      <label class="control-label col-sm-2" for="amtdue">Amount Due:</label>
      <div class="col-sm-4">
        <input type="text" class="form-control" id="amtdue" placeholder="Amount Due" name="amtdue">
      </div>
    </div>
    <div class="form-group">
      <label class="control-label col-sm-2" for="ptype">Payment Type:</label>
      <div class="col-sm-3">
        
        <label class="radio-inline" for="latefee"><input type="radio" id="ptype" name="ptype" value="late fee"> Late Fee</label>
       
        <label class="radio-inline" for="rent"> <input type="radio" id="ptype" name="ptype" value="rent"> Rent </label>
        
        <label class="radio-inline" for="wages"><input type="radio" id="ptype" name="ptype" value="wages"> Wages</label>
      </div>
    </div>
    <div class="form-group">
      <label class="control-label col-sm-2" for="d_date">Due Date:</label>
      <div class="col-sm-4">
        <input type="date" class="form-control" id="d_date" placeholder="Due Date" name="d_date">
      </div>
    </div>

    <div class="form-group">
      <label class="control-label col-sm-2" for="overdue">Overdue:</label>
      <div class="col-sm-4">
        <input type="text" class="form-control" id="overdue" placeholder="Overdue" name="overdue">
      </div>
    </div>

    <div class="form-group">
      <label class="control-label col-sm-2" for="amtpaid">Amount Paid:</label>
      <div class="col-sm-4">
        <input type="text" class="form-control" id="amtpaid" placeholder="Amount Paid" name="amtpaid">
      </div>
    </div>

    <div class="form-group">
      <label class="control-label col-sm-2" for="c_card">Credit Card Number:</label>
      <div class="col-sm-4">
        <input type="text" class="form-control" id="c_card" placeholder="Credit Card Number" name="c_card">
      </div>
    </div>

    <div class="form-group">        
      <div class="col-sm-offset-2 col-sm-1">
        <button type="submit" class="btn btn-default" onclick="alert('Thank You! Your payment submitted successfully!')">Submit</button>
      </div>
    </div>
  </form>
</div>

	<div class="footer">
<br>	
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


if(isset($_POST['amtdue'])) 
{
	$employeeId = $_POST['empid'];
	$customerId = $_POST['custid'];
  $amountDue = $_POST['amtdue'];
  $type = $_POST['ptype'];
	$dueDate = $_POST['d_date'];
	$overdue = $_POST['overdue'];
  $amountPaid = $_POST['amtpaid'];
  $creditCardNo = $_POST['c_card'];
	
	if ($employeeId!='')
	{$query = "INSERT INTO financial_transaction (employeeId, amountDue, type, dueDate, overdue, amountPaid) VALUES ('$employeeId', '$amountDue', '$type', '$dueDate', '$overdue', '$amountPaid')";
	}
	else
	{$query = "INSERT INTO financial_transaction (customerId, amountDue, type, dueDate, overdue, amountPaid, creditCardNumber) VALUES ('$customerId', '$amountDue', '$type', '$dueDate', '$overdue', '$amountPaid', '$creditCardNo')";
	}
	
	$result = $conn->query($query); 
	if(!$result) die($conn->error);
	
	//header("Location: landing.php");
	
}

?>