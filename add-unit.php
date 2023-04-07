<html>
	<head>
		<title>Add Unit Page</title>
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
		<h1>Add New Unit</h1>
		</div>
		<div class="middlepageform">
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
 <?php
//error_reporting(E_ALL);
//ini_set('display_errors', 1);

$page_roles = array('CTO');

require_once 'loginCreds.php';
require_once 'checksession.php';

$conn = new mysqli($hn, $un, $pw, $db);
if($conn->connect_error) die($conn->connect_error);

if(isset($_POST['propertyId']))
{
	$query = $conn->prepare('INSERT INTO property_unit (propertyId, beds, baths, price, squareFootage, occupied)
	VALUES(?, ?, ?, ?, ?, ?)');
	$query->bind_param('iissii', $propertyId, $beds, $baths, $price, $squareFootage, $occupied);
	$propertyId = $_POST['propertyId'];
	$beds = $_POST['beds'];
	$baths = $_POST['baths'];
	$price = $_POST['price'];
	$squareFootage = $_POST['squareFootage'];
	if($_POST['occupied']=="no")
	{$occupied = 0;}
		else
		{$occupied = 1;}


	
	$query->execute();
	printf("%d Row inserted.\n", $query->affected_rows);
	//$query->close();
	
	header("Location: unit-list.php");
}

$conn->close();
?>