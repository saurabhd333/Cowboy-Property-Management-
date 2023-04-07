<html>
	<head>
		<title>Add Property Page</title>
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
		<h1>Add New Property</h1>
		</div>
		<div class="middlepageform">
      <form method='post' action='add-property.php'>
        Property ID: (Will be populated by database).
		<br><br>
		Property Name: 
		<input type="text" name="name">
		<br><br>
		Manager (Employee ID): 
		<input type="text" name="manager">
		<br><br>
        <input type="submit", value="Submit New Property" onclick="alert('Thank You! Your new property submitted successfully.')">
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

if(isset($_POST['name']))
{
	$query = $conn->prepare('INSERT INTO property (name, manager) VALUES(?, ?)');
	$query->bind_param('si', $name, $manager);
	$name = $_POST['name'];
	$manager = $_POST['manager'];
	
	$query->execute();
	printf("%d Row inserted.\n", $query->affected_rows);
	//$query->close();
	
	header("Location: landing.php");
}

$conn->close();
?>