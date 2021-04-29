<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body style="background-color:white-space: ";>
	<?php
	    $firstName = $lastName = $gender = $dob = $nid = $address = $phone = $email = $user = $password =$recEmail="";
	    $firstNameErr = $lastNameErr = $genderErr = $dobErr = $nidErr = $addressErr = $phoneErr = $emailErr = $userErr =
	    $passwordErr =$recEmailErr="";
	    $hostname = "localhost";
	$username = "hridoy_user_1";
	$password = "1234";
	$dbname = "hridoy";

	$conn1 = mysqli_connect($hostname, $username, $password, $dbname);
	    if($_SERVER['REQUEST_METHOD']=="POST"){
	    	if(empty($_POST['fname']))
	    	{
	    		$firstNameErr="Please fill up the first name";
	    	}
	    	else
	    	{
	    		$firstName=trim($_POST['fname']);
	    	}
	    	if(empty($_POST['lname']))
	    	{
	    		$lastNameErr="Please fill up the last name";
	    	}
	    	else
	    	{
	    		$lastName=trim($_POST['lname']);
	    	}
	    	if(empty($_POST['gender']))
	    	{
	    		$genderErr="Please Select Gender";
	    	}
	    	else
	    	{
	    		$gender=($_POST['gender']);
	    	}
	    	if(empty($_POST['birthday']))
	    	{
	    		$dobErr="Please Select your Birthday";
	    	}
	    	else
	    	{
	    		$dob=$_POST['birthday'];
	    	}
	    	if(empty($_POST['nid']))
	    	{
	    		$nidErr="Please fill up the NID";
	    	}
	    	else
	    	{
	    		$nid=trim($_POST['nid']);
	    	}
	    	if(empty($_POST['preAdd']))
	    	{
	    		$addressErr="Please fill up the address";
	    	}
	    	else
	    	{
	    		$address=trim($_POST['preAdd']);
	    	}
	    	if(empty($_POST['phone']))
	    	{
	    		$phoneErr="Please fill up the phone number";
	    	}
	    	else
	    	{
	    		$phone=trim($_POST['phone']);
	    	}
	    	if(empty($_POST['email']))
	    	{
	    		$emailErr="Please fill up the email";
	    	}
	    	else
	    	{
	    		$email=trim($_POST['email']);
	    	}

	    	if(empty($_POST['uname']))
	    	{
	    		$userErr="Please fill up the user name";
	    	}
	    	else
	    	{
	    		$user=trim($_POST['uname']);
	    	}
	    	if(empty($_POST['password']))
	    	{
	    		$passwordErr="Please Enter a password";
	    	}
	    	else
	    	{
	    		$password=trim($_POST['password']);
	    	}
	    	if(empty($_POST['recemail']))
	    	{
	    		$recEmailErr="Please Fill up the reccovary email";
	    	}
	    	else
	    	{
	    		$recEmail=trim($_POST['recemail']);
	    	}

	    	if($firstNameErr == "" && $lastNameErr == "" && $genderErr == "" && $dobErr =="" && $nidErr =="" && $addressErr =="" && $phoneErr =="" && $emailErr=="" && $userErr =="" && $passwordErr=="" && $recEmailErr=="") {
	    		$sql ="insert into users values('{$firstName}','{$lastName}','{$gender}','{$dob}','{$nid}','{$address}','{$phone}','{$email}','{$user}','{$password}','{$recEmail}')";

		    $result = mysqli_query($conn1,$sql);
		    if($result)
		    {
			   echo "Successfully inserted!";
			   //header('location:ManagerlogIn.php');
		    }
		    else
		    	{
			echo "Failed to insert";
			echo "<br>";
			echo $conn1->error;

            }
			//echo "<h2>Successful</h2> ";
			
	        /*echo "Firset Name:  $firstName "."<br>";
	        echo "Last Name:  $lastName "."<br>";
	        echo"Gender:  $gender" ."<br>";
	        echo"DOB:  $dob" ."<br>";
	        echo"NID:  $nid" ."<br>";
	        echo"Address:  $address" ."<br>";
	        echo"Phone:  $phone" ."<br>";
	        echo"Email:  $email" ."<br>";
	        echo"User Name:  $user" ."<br>";
	        echo "Password:  $password" ."<br>"; 
	        echo"Recovary Email:  $recEmail" ."<br>";
	       
	        $W=fopen("ManagerInfo.txt","a");
	        fwrite($W,$firstName ."\n");
	        fwrite($W,$lastName ."\n");
            fwrite($W,$gender ."\n");
            fwrite($W,$dob ."\n");
            fwrite($W,$nid ."\n");
            fwrite($W,$address ."\n");
            fwrite($W,$phone ."\n");
            fwrite($W,$email."\n");
	        fwrite($W,$user."\n");
	        fwrite($W,$password ."\n");
	        fwrite($W,$recEmail."\n");*/
	       /* $arr1 = array('firstname' =>$_POST['fname'], 'lastname' =>$_POST['lname'], 'gender' =>$_POST['gender'],'DOB' =>$_POST['birthday'], 'NID' =>$_POST['nid'],'address' =>$_POST['preAdd'],'phone' =>$_POST['phone'],                'email'=>$_POST['email'],'user'=>$_POST['uname'],'password'=>$_POST['password'],'Remail'=>$_POST['recemail']);
            $json_encoded_1 = json_encode($arr1);
            $f1 = fopen("Managerinfo.txt", "a");
            fwrite($f1, $json_encoded_1 . "\n");
            fclose($f1);


            $userinfo = array('user'=>$_POST['uname'],'password'=>$_POST['password']);
                            $userinfo_encoded = json_encode($userinfo);

                            $log_filepath = "LogIn.txt";

                            $log_file = fopen($log_filepath, "a");
                            fwrite($log_file, $userinfo_encoded . "\n");  
                            fclose($log_file);


                            header('Location:ManagerLogIn.php');
                            exit; */

	       
		   }

       }
       mysqli_close ($conn1);
   ?>
	

	 
	


    <h1 style="text-align:center;"><em>Registration Form</em></h1>
	<form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']) ?>" method="POST">
    <fieldset>
    	
		<label for="firstname">First Name :</label> 
		<input type="txt" id="firstname" name="fname" value="<?php echo $firstName ?>">
		<p><?php echo $firstNameErr;?></p>
		<br>
		<label for="lastname">Last Name :</label> 
		<input type="txt" id="lastname" name="lname" value="<?php echo $lastName ?>">
		<p><?php echo $lastNameErr;?></p>
		<br>
	    <label>Gender:</label>
		<input type="radio" name="gender"
        <?php if (isset($gender) && $gender=="male") echo "checked";?>
        value="male">Male
        <input type="radio" name="gender"
        <?php if (isset($gender) && $gender=="female") echo "checked";?>
         value="female">Female
		<p><?php echo $genderErr;?></p>
		<br>
		<label>Dob:</label>
		<input type="date" id="birthday" name="birthday" value="<?php echo $dob ?>">
		<p><?php echo $dobErr;?></p>
		<br>
		<label for="nid">NID:</label>
        <input type="number" id="nid" name="nid" value="<?php echo $nid ?>">
        <p><?php echo $nidErr;?></p>
    </fieldset>
	     <br>

	<fieldset>

        <label>Present address:</label>
		<input type="text" id="presentaddress" name="preAdd" value="<?php echo $address ?>">
		<p><?php echo $addressErr;?></p>
		<br>
		<label for="phone">Phone:</label>
        <input type="number" id="phone" name="phone" pattern="[0-9]{3}-[0-9]{2}-[0-9]{3}" value="<?php echo $phone ?>">
        <p><?php echo $phoneErr;?></p>
        <br>
        <label for="email">Email:</label>
        <input type="email" id="EmailId" name="email" value="<?php echo $email ?>">
        <p><?php echo $emailErr;?></p>
        <br>
      
    </fieldset>
        <br>
     <fieldset>
    
		<label for="user">User Name :</label> 
		<input type="txt" id="username" name="uname" value="<?php echo $user ?>">
		<p><?php echo $userErr;?></p>
		<br>
		<lable for="pass">Passwod :</lable>
		<input type="password" name="password" id="password" value="<?php echo $password ?>">
		<p><?php echo $passwordErr;?></p>
		<br>
		<label for="email">Recovary Email:</label>
        <input type="email" id="recEmailId" name="recemail" value="<?php echo $recEmail ?>">
        <p><?php echo $recEmailErr;?></p>
        <br><br>
		
     </fieldset>
     <br>
     <input type="submit" value="Sign up" style="color:black">

   <?php
    echo "<br>";
    echo "<br>";
    
   /*if(isset($_POST['signup'])){
	
	$firstName = $_POST['firstName'];
	$lastName = $_POST['lastName'];
	$gender = $_POST['gender'];
	$dob = $_POST['dob'];
	$nid = $_POST['nid'];
	$address = $_POST['address'];
	$phone = $_POST['phone'];
	$email = $_POST['email'];
	$user = $_POST['user'];
	$password = $_POST['password'];
	$recEmail = $_POST['recEmail'];
	
	
	
	
	if($pass==$cpass){
		
		$query= "select*from user where email='$email'";
		$query_run= mysqli_query($conn1,$query);
		if($query_run){
			
			if(mysqli_num_rows($query_run) >0){
				
				echo "
		<script>
		alert('User ALready Registered ');
		window.location.href='ManagerLogIn.php';
		</script>
		";
				
				
			}else{
				
	$insertion= "insert into users values('$firstName','$lastName','$gender','$dob','$nid','$address','$phone','$email','$user','$password','$recEmail')";
	
	           
				$insertion_run = mysqli_query($conn1,$insertion);
				
				if($insertion_run ){
					
					echo "
		<script>
		alert('Registration Successful ');
		window.location.href='home.php';
		</script>
		";
					
				}else{
					
						echo "
		<script>
		alert('Registration Failed  ');
		window.location.href='ManagerRegistration.php';
		</script>
		";
				}
				
				
			}
			
			
			
		}else{
			echo "
		<script>
		alert('Database Problem');
		window.location.href='ManagerRegistration.php';
		</script>
		";
			
		}
		
		
	}
	else{
		echo "
		<script>
		alert('Password & Confirm Password not match');
		window.location.href='ManagerRegistration.php';
		</script>
		";
	}
	
	
}
else{
	
	
}*/

    
    
       
  ?>

     


</form>

 
</body>
</html>

