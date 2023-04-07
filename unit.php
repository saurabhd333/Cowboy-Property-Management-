<html>
	<head>
		<title>Update/View Unit Page</title>
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
		
               <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>

		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
		<link rel="stylesheet" href="styles.css" type="text/css"/>
	</head>

	<body>
	<?php require_once 'navigation.php'; ?>
		<div class="header">
			  <a href="landing.php">
	  <img height=100px width=100px src='images/boot-logo.png'></img>
	  </a>
		<h1>Unit Details</h1>
		</div>
		<!---<div class="middlepageform">
      <form method='post' action='add-unit.php'>
        Unit ID: (Will be populated by database).
		<br><br>
		Property ID: 
		<input type="text" name="propertyId">
		<br><br>
		Number of Beds:
		<input type="text" name="beds">
		<br><br>
		Number of Baths:
		<input type="text" name="baths">
		<br><br>
		Price per Month:
		<input type="text" name="price">
		<br><br>
		Square Footage:
		<input type="text" name="squareFootage">
		<br><br>
		Occupied?:
		<select id='occupied' name='occupied'>
		<option value="no">No</option>
		<option value="yes">Yes</option>
		</select>
		<br><br>
        <input type="submit", value="Submit New Unit" onclick="alert('Thank You! Your new unit submitted successfully.')">
      </form>
	  <div class="logout">
		<form method='post' action='logout.php'>
		<input type='submit' value='Logout'>
		</form>
		</div>
	  </div>--->
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
//error_reporting(E_ALL);
//ini_set('display_errors', 1);

$page_roles = array('CTO', 'employee');

require_once 'loginCreds.php';
require_once 'checksession.php';

mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);
$conn = new mysqli($hn, $un, $pw, $db);
if($conn->connect_error) die($conn->connect_error);

if(isset($_GET['unitId']))
{
	$unitId = $_GET['unitId'];
	
	
	$query = "SELECT * FROM property_unit WHERE unitId = $unitId";
	
	$result = $conn->query($query);
	if(!$result) die($conn->error);
	
	$rows = $result->num_rows;

for($j=0; $j<$rows; ++$j)
{
	//$result->data_seek($j);
	$row = $result->fetch_array(MYSQLI_ASSOC);
	 if($row['occupied']=="0")
	{$occupied = 'No';}
		else
		{$occupied = 'Yes';}
	
echo <<<_END

<form action='unit.php' method='post'>

<pre>
	Unit ID: $row[unitId]
	Property ID: <input type='text' name='propertyId' value='$row[propertyId]'>
	Beds: <input type='text' name='beds' value='$row[beds]'>
	Baths: <input type='text' name='baths' value='$row[baths]'>
	Price: <input type='text' name='price' value='$row[price]'>
	Square Footage: <input type='text' name='squareFootage' value='$row[squareFootage]'>
	Occupied?: <input type='text' name='occupied' value='$occupied'>
</pre>

		<input type='hidden' name='unitId' value='$row[unitId]'>
		<input type='submit' value='UPDATE RECORD'>	
		<input type='hidden' name='update' value='yes'>
	</form>

_END;
	
	
}
}
if(isset($_POST['update']))
{
	$unitId = $_POST['unitId'];
	$propertyId = $_POST['propertyId'];
	$beds = $_POST['beds'];
	$baths = $_POST['baths'];
	$price = $_POST['price'];
	$squareFootage = $_POST['squareFootage'];
	if($_POST['occupied']=="no")
	{$occupied = 0;}
		else
		{$occupied = 1;}
	$query = $conn->prepare('UPDATE property_unit SET propertyId=?, beds=?, baths=?, price=?, squareFootage=?, occupied=?
	WHERE unitId=?');
	$query->bind_param('iissiii', $propertyId, $beds, $baths, $price, $squareFootage, $occupied, $unitId);
	

	$query->execute();
	printf("%d Row inserted.\n", $query->affected_rows);
	//$query->close();
	
	header("Location: landing.php");
}


$conn->close();
?>