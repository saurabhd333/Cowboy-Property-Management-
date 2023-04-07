<?php
$page_roles = array('CTO');
 require_once 'checksession.php';
//import credentials for db
require_once  'loginCreds.php';

//connect to db
$conn = new mysqli($hn, $un, $pw, $db);
if($conn->connect_error) die($conn->connect_error);



if(isset($_POST['delete']))
{
	$propertyId = $_POST['propertyId'];

	$query = "DELETE FROM property WHERE propertyId='$propertyId' ";
	
	//Run the query
	$result = $conn->query($query); 
	if(!$result) die($conn->error);
	
	//Return to the landing page
	header("Location: landing.php");
	
}


?>