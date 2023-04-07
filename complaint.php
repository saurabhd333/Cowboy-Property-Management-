<html>
	<head>
		<title>Complaint Page</title>
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
		<h1>Submit Complaint</h1>
		</div>
		<div class="middlepageform">
      <form method='post' action='complaint.php'>
        Complaint Type:
        <select id='complaintType' name='complaintType' size=1>
		<option value="none">None</option>
		<option value="noise">Noise</option>
		<option value="smell">Smell</option>
		<option value="trash">Trash</option>
		<option value="safety">Safety</option>
		</select>
		<br><br>
		Date of Event:
		<input type="datetime-local" name="date">
		<br><br>
		Description:
		<textarea id="description" name="description" rows="4"></textarea>
		<br><br>
        <input type="submit", value="Submit Complaint" onclick="alert('Thank You! Your complaint submitted successfully.')">
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

 $page_roles = array('customer');

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
$query3 = "SELECT leaseId FROM lease WHERE customerId IN (SELECT customerId FROM customer WHERE userId = $userId)";
$result3 = $conn->query($query3);
if(!$result3) die($conn->error);
$row3 = mysqli_fetch_array($result3);

if(isset($_POST['description']))
{
	$query = $conn->prepare('INSERT INTO complaint (type, dateTime, description, complainant, leaseId)
	VALUES(?, ?, ?, ?, ?)');
	$query->bind_param('sssii', $complaintType, $date, $description, $complainant, $leaseId);
	$complaintType = $_POST['complaintType'];
	$date = $_POST['date'];
	$description = $_POST['description'];
	$complainant = $row2['userId'];
	$leaseId = $row3['leaseId'];
	
	$query->execute();
	printf("%d Row inserted.\n", $query->affected_rows);
	//$query->close();
	
	header("Location: landing.php");
}
}

$conn->close();
?>