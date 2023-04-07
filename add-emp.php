<html>
    <head>
        <title>Add Employee Page</title>
        <link rel="stylesheet" href="styles.css">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>

		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script> 
    </head>

<body>	
<?php require_once 'navigation.php'; ?>  
<div class="container">
<div class="header">
  <h2>Add Employee</h2>
</div>
  <form class="form-horizontal" method='post' action="add-emp.php">
  <div class="form-group">
      <label class="control-label col-sm-2" for="userid">User Id:</label>
      <div class="col-sm-4">
        <input type="text" class="form-control" id="userid" placeholder="User Id" name="userid">
      </div>
    </div>
    <div class="form-group">
      <label class="control-label col-sm-2" for="f_name">First Name:</label>
      <div class="col-sm-4">
        <input type="text" class="form-control" id="f_name" placeholder="First Name" name="f_name">
      </div>
    </div>
    <div class="form-group">
      <label class="control-label col-sm-2" for="l_name">Last Name:</label>
      <div class="col-sm-4">
        <input type="text" class="form-control" id="l_name" placeholder="Last Name" name="l_name">
      </div>
    </div>
    <div class="form-group">
      <label class="control-label col-sm-2" for="emptype">Employee Type:</label>
      <div class="col-sm-4">
        <input type="text" class="form-control" id="emptype" placeholder="Employee Type" name="emptype">
      </div>
</div>
    
    <div class="form-group">        
      <div class="col-sm-offset-2 col-sm-1">
        <button type="submit" class="btn btn-default" onclick="alert('Employee added successfully!')">Submit</button>
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

$page_roles = array('CTO');

require_once 'loginCreds.php';
require_once 'checksession.php';

$conn = new mysqli($hn, $un, $pw, $db);
if($conn->connect_error) die($conn->connect_error);


if(isset($_POST['f_name'])) 
{
	$userId = $_POST['userid'];
	$firstName = $_POST['f_name'];
	$lastName = $_POST['l_name'];
	$empType = $_POST['emptype'];
	
		
	$query = "INSERT INTO employee (userId, firstName, lastName, employeeType) VALUES ('$userId' ,'$firstName', '$lastName','$empType')";
	

	$result = $conn->query($query); 
	if(!$result) die($conn->error);
	
	header("Location: list-emp.php");
	
}


?>