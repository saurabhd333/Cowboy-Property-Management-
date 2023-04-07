<?php

require_once 'loginCreds.php';

$conn = new mysqli($hn, $un, $pw, $db);
if($conn->connect_error) die($conn->connect_error);


//Bill Smith
/*$firstName = 'Bill';
$lastName = 'Smith';
$username = 'bsmith';
$password = 'mysecret';
$token = password_hash($password,PASSWORD_DEFAULT); 

add_user($conn, $firstName, $lastName, $username, $token); */

//Pauline Jones
/*$firstName = 'Pauline';
$lastName = 'Jones';
$username = 'pjones';
$password = 'acrobat';
$token = password_hash($password,PASSWORD_DEFAULT); 

add_user($conn, $firstName, $lastName, $username, $token);*/

//Bob Customer
$firstName = 'Bob';
$lastName = 'Customer';
$username = 'bcustomer';
$password = 'customer101';
$token = password_hash($password,PASSWORD_DEFAULT); 

add_user($conn, $firstName, $lastName, $username, $token);

function add_user($conn, $firstName, $lastName, $username, $token){
	//code to add user here
	$query = "insert into website_user(firstName, lastName, username, password, userStatus) values ('$firstName', '$lastName', '$username', '$token', 'active')";
	$result = $conn->query($query);
	echo "Added users.";
	if(!$result) die($conn->error);
}


?>


