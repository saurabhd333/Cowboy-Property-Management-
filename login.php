 <html>
      <head>
        <title>Login Page</title>
		<link rel="stylesheet" href="styles.css" type="text/css"/>
      </head>
	  
      <body>
		<div class="header">
			  <a href="login.php">
	  <img height=100px width=100px src='images/boot-logo.png'></img>
	  </a>
		<h1>Sign In</h1>
		</div>
      <form method='post' action='login.php'>
        Username:
        <input type="text" name="username">
		<br><br>
		Password:
		<input type="password" name="password">
		<br><br>
        <input type="submit", value="Sign In">
      </form>
      </body>
 </html>
 
 
 <?php
 require_once 'loginCreds.php';
 require_once 'user.php';

$conn = new mysqli($hn, $un, $pw, $db);
if($conn->connect_error) die($conn->connect_error);

if (isset($_POST['username']) && isset($_POST['password'])) {
	
	//Get values from login screen
	$tmp_username = mysql_entities_fix_string($conn, $_POST['username']);
	$tmp_password = mysql_entities_fix_string($conn, $_POST['password']);
	
	//get password from DB w/ SQL
	$query = "SELECT password FROM website_user WHERE username = '$tmp_username'";
	
	$result = $conn->query($query); 
	if(!$result) die($conn->error);
	
	$rows = $result->num_rows;
	$passwordFromDB="";
	for($j=0; $j<$rows; $j++)
	{
		$result->data_seek($j); 
		$row = $result->fetch_array(MYSQLI_ASSOC);
		$passwordFromDB = $row['password'];
	
	}
	
	//Compare passwords
	if(password_verify($tmp_password,$passwordFromDB))
	{
		echo "successful login<br>";
		
		$user = new User($tmp_username);

		session_start();
		$_SESSION['user'] = $user;
		
		header("Location: landing.php");
	}
	else
	{
		echo "login error<br>";
	}	
	
}

$conn->close();


//sanitization functions
function mysql_entities_fix_string($conn, $string){
	return htmlentities(mysql_fix_string($conn, $string));	
}

function mysql_fix_string($conn, $string){
	$string = stripslashes($string);
	return $conn->real_escape_string($string);
}


?>