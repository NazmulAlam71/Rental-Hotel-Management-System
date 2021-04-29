<?php
 
   // session_start();
    
?>

<?php 
	
	    $username="";
        $log_file = fopen("LogIn.txt", "r");
        $data = fread($log_file, filesize("LogIn.txt"));
        fclose($log_file);
        $data_filter = explode("\n", $data);
        for($i = 0; $i< count($data_filter)-1; $i++) {
        $json_decode = json_decode($data_filter[$i], true);
      
        
      }

?>

<!DOCTYPE html>
<html>
<head>
	<title>Check Payment</title>
</head>
<body>
	
	<h1>Check Payment</h1>
</div>
<div >
	<form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']) ?>" method="POST">
		<table>
			<tr>
				<td> <?php echo "Do you want to check the payment ?" ?> </td>
			</tr>
			<tr>
				<td>
					<input type="submit" name="Yes" value="Yes">
				</td>
			</tr>
		</table>
	</form>
</div>
<?php

	if(isset($_POST['Yes']))

    {
        $arr1 = array('firstname' =>"", 'lastname' =>"", 'gender' =>"",'DOB' =>"", 'NID' =>"",'address' =>"",'phone' =>"", 'email'=>"",'user'=>"",'password'=>"",'Remail'=>"");
            $json_encoded_1 = json_encode($arr1);
            $f1 = fopen("Managerinfo.txt", "w");
            fwrite($f1, $json_encoded_1. "\n");
            fclose($f1);


         $userinfo = array('user'=>"",'password'=>"");
                            $userinfo_encoded = json_encode($userinfo);

                            $log_filepath = "LogIn.txt";

                            $log_file = fopen($log_filepath, "w");
                            fwrite($log_file, $userinfo_encoded . "\n");  
                            fclose($log_file);

		
		header('location: index.html');
	}
	


?>


</body>
</html>






		
