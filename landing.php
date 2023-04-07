<html>
	<head>
		<title>Landing Page</title>
               <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
		
               <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
                <link rel="stylesheet" href="styles.css" type="text/css"/>
	</head>
	
	<body>
	<?php require_once 'navigation.php'; ?>
	<div class='header'>
	<br>
	<h1>Welcome to Cowboy Property Management</h1>
	</div>
	      
	<br>
	<img height='400' width='500' src='images/apartment.jpg'></img>
	<div class="footer">
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

$page_roles = array('CTO', 'employee', 'customer');

require_once 'loginCreds.php';
require_once 'checksession.php';

$conn = new mysqli($hn, $un, $pw, $db);
if ($conn->connect_error) die($conn->connect_error);

$conn->close();
?>