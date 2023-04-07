<?php

$page_roles = array('CTO');
 require_once 'checksession.php';
require_once  'loginCreds.php';


$conn = new mysqli($hn, $un, $pw, $db);
if($conn->connect_error) die($conn->connect_error);



if(isset($_POST['delete']))
{
  $unitId = $_POST['unitId'];

  $query = "DELETE FROM property_unit WHERE unitId='$unitId' ";
	
	
  $result = $conn->query($query); 
  if(!$result) die($conn->error);
	
  header("Location: unit-list.php");
	
}

$conn->close();


?>