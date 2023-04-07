<html> 
<head>
 <title>Change Password</title>
<link rel="stylesheet" href="styles.css">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">

		
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>

		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script> 
</head>
 <body>
<?php require_once 'navigation.php'; ?>
<div class="container">
<div class="header">
   <h2>Change Password</h2>
</div>

<?php
$page_roles = array('CTO', 'employee', 'customer');
require_once  'loginCreds.php';
require_once  'checksession.php';


$conn = new mysqli($hn, $un, $pw, $db);
if($conn->connect_error) die($conn->connect_error);


$query = "Select * from website_user where username = '$username'";

$result = $conn->query($query); 
if(!$result) die($conn->error);

$rows = $result->num_rows;

for($j=0; $j<$rows; $j++)
{
	 
  $row = $result->fetch_array(MYSQLI_ASSOC); 
  $password = $row['password'];
  
  
  
    echo <<<_END
     
        <form class="form-horizontal"  method='post' action="change_password.php">
    <div class="form-group">
      <label class="control-label col-sm-2" for="current_password">Current Password:</label>
      <div class="col-sm-4">
        <input type="password" class="form-control" id="current_password"  placeholder="Current Password" name="current_password">
      </div>
    </div>
    <div class="form-group">
      <label class="control-label col-sm-2" for="new_password">New Password:</label>
      <div class="col-sm-4">
        <input type="password" class="form-control" id="new_password"  placeholder="New Password" name="new_password">
      </div>
    </div>
    
    <div class="form-group">        
      <div class="col-sm-offset-2 col-sm-10">
       <input type='hidden' name='update' value='yes'>
	     <input type='hidden' name='userId' value='$row[userId]'>
        <button type="submit" class="btn btn-default">Update</button>
      </div>
    </div>
  </form>
	
_END;

}



if(isset($_POST['update'])){

	      $userId = $_POST['userId'];
        $old_password = mysql_entities_fix_string($conn, $_POST['current_password']);
        $new_password = mysql_entities_fix_string($conn, $_POST['new_password']);

 
	if(password_verify($old_password, $password)){
          $new_password = password_hash($_POST['new_password'], PASSWORD_DEFAULT);
	
          $query3 = "UPDATE website_user set password = '$new_password' where userId = $userId";
	
          $result2 = $conn->query($query3); 
          if(!$result2) die($conn->error);
          echo 'Password changed';
	}
         
        else
        {
         echo 'Old Password  is not valid!';
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