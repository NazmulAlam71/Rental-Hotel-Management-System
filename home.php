<?php
  session_start();
?>
<!DOCTYPE html>
<html>
<head>
	<title>Home Page</title>
</head>
<body>
<div>
	<h1>Welcome to my Home, 
			<?php
			  $log_file = fopen("LogIn.txt", "r");
              $data = fread($log_file, filesize("LogIn.txt"));
              fclose($log_file);
              $data_filter = explode("\n", $data);
              for($i = 0; $i< count($data_filter)-1; $i++) {
              $json_decode = json_decode($data_filter[$i], true);
              if($json_decode['user'] == $_SESSION['user'] && $json_decode['password'] ==$_SESSION['password']) 
              {
              	$username = $json_decode['user'];
				echo $username;
              }
          }
				 
			?>		
		</h1>
	</div>

	<div>
		<a href="ManagerDetails.php">View Profile</a> |
		<a href="DeleteUser.php">Delete Profile</a> |
		<a href="ManagerLogout.php"> Logout</a> |
		<a href="ConfirmBooking.php"> Confirm Booking</a> |
		<a href="CheckPayment.php"> Check Payment</a> |
		<a href="ChangePassword.php"> Change Password</a> |
		<a href="Search.php"> Search</a>		
	</div>

	<div id="main_content">
		
	</div>


<?php
  echo"<br>";
  echo"<br>";
  echo"<br>";
  echo"<br>";

 ?>

</body>
</html>	

	