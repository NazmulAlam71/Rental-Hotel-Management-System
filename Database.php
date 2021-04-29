<?php

//session_start()

?>



<?php

	
 	$hostname = "localhost";
	$username = "hridoy_user_1";
	$password = "1234";
	$dbname = "hridoy";

	$conn1 = mysqli_connect($hostname, $username, $password, $dbname);
	
	if ($_SERVER["REQUEST_METHOD"] == "POST") 
	{
         if(empty ($_POST['fname']) || empty($_POST['lname'])||empty($_POST['gender'])||empty($_POST['dob'])||empty($_POST['nid'])||empty($_POST['address']) || empty ($_POST['phone']) || empty($_POST['email'])||empty($_POST['user'])||empty($_POST['password'])||empty($_POST['recEmail']))
         {
         	echo "<h2>Please Fill up the from properly</h2>";
         }
         else
         {

            $firstname=$_POST['fname'];
	        $lastname=$_POST['lname'];
	        $gender=$_POST['gender'];
	        $dob =$_POST['dob'];
	        $nid=$_POST['nid'];
	        $address=$_POST['address'];
	        $phone=$_POST['phone'];
	        $email=$_POST['email'];
	        $user=$_POST['user'];
	        $password=$_POST['password'];
	        $recEmail=$_POST['recEmail'];

	        
	        $sql ="insert into users values({$firstname}','{$lastname}','{$gender}','{$dob}','{$nid}','{$address}','{$phone}','{$email}','{$user}','{$password}','{$recEmail}')";

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


		   /* 
		    else
		    {
			 
	 $reggg= "insert into users (firstname , lastname , gender , dob , nid , address , phone , email , user , password , recEmail) values ('$firstname','$lastname','$gender','$dob','$nid','$address','$phone','$email','$user','$password','$recEmail')";
	 
	 mysqli_query($conn1, $reggg);
	 echo" Reservation Successful";
 

            } */
		}
	}

	//mysqli_close($conn1);

?>
