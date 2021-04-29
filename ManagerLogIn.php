<?php
  session_start();
?>
<!DOCTYPE html>
<html>
<head>
  <script>
function validateForm() {
  var x = document.forms["myForm"]["uname"].value;
  var y = document.forms["myForm"]["password"].value;
 

  if (x == "") {
    alert("please fill up the form properly");
    return false;
  }

  
   if (y == "") {
    alert("please fill up the form properly");
    return false;
  }


 

  
}
</script>

  <title>Log In Form</title>
</head>
<center><form name="myForm" action="ManagerLogIn.php" method="POST"  onsubmit="return validateForm()">


<body style="background-color:white-space: ";>
   
  <?php

  $hostname = "localhost";
  $username = "hridoy_user_1";
  $Password = "1234";
  $dbname = "hridoy";

  $conn1 =new mysqli($hostname, $username, $Password, $dbname); 

  $user=$password="";
  if ($_SERVER["REQUEST_METHOD"] == "POST") {
         if(empty($_POST['uname'])||empty($_POST['password'])){
          echo "<h2>Please Fill up the form properly</h2>";
         }
         else{
          $user=trim($_POST['uname']);
          $password=trim($_POST['password']);
          $log_file = fopen("Login.txt", "r");
          $data = fread($log_file, filesize("Login.txt"));
          fclose($log_file);
          $data_filter = explode("\n", $data);
          for($i = 0; $i< count($data_filter)-1; $i++) {
            $json_decode = json_decode($data_filter[$i], true);
            if($json_decode['user'] == $user && $json_decode['password'] == $password); 
            {
              
              $_SESSION['user'] = $user;
              $_SESSION['password'] = $password;
              header("Location:home.php");
              exit;
              //echo "<a href='ManagerDetails.php'> View Profile</a>" ;
            }
          }
          echo "Password is wrong! Please Try Again.";
      }
    }
           
        
     
       
  ?>
  
  
  


  <h2 style="text-align:center">Login Form</h2>
  <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']) ?>" method="POST" align="center">
   <div>
    <label for="uname"><b>Username</b></label><br>  
    <input type="text" placeholder="Enter Username" name="uname" >
    <br><br>

    <label for="psw"><b>Password </b></label><br> 
    <input type="password" placeholder="Enter Password" name="password">
    <br><br>
        
    <button type="submit">Login</button>
    <br>
    
  </div>
  <?php
    echo "<br>";
    echo "<br>";

   
       
  ?>
 

  </form>
</body>
</html>