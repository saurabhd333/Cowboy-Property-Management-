<?php


$page_roles = array('employee');

require_once 'loginCreds.php';
require_once 'checksession.php';


$conn = new mysqli($hn, $un, $pw, $db);
if($conn->connect_error) die($conn->connect_error);



if(isset($_POST['delete']))
{
  $cust_id = $_POST['cust_id'];

  $query = "DELETE FROM customer WHERE customerId='$cust_id' ";
  $query1 = "DELETE FROM website_user WHERE customerId='$cust_id' ";
	
	
  $result = $conn->query($query);
  $result1 = $conn->query($query1);  
  if(!$result) die($conn->error);
  if(!$result1) die($conn->error);
	
  header("Location: renters-list.php");
	
}

$conn->close();


?>