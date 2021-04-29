<?php
   if(!isset($_SESSION)) 
    

?>
<!DOCTYPE html>
<html>
    <head>
        <title>Change Password</title>
        <meta name="viewport" content="width=device-width, initial-scale=1">
    </head>
    <body style="background-color:white-space: ";>
        <?php
         
         include('home.php');
        ?>
        <?php
            
            $newpass="";
            $emptyerr = $passerr = $currenterr= "";
            
            $hostname = "localhost";
            $username = "hridoy_user_1";
            $Password = "1234";
            $dbname = "hridoy";

            $conn1 =  mysqli_connect($hostname, $username, $Password, $dbname);       

           

            if($_SERVER['REQUEST_METHOD'] == "POST" && $_REQUEST['button'] == "Change Password") 
            {

                if(empty($_POST['currentpassword']) || empty($_POST['newpassword']) ||empty($_POST['confirmpassword'])) 
                {
                    
                    $emptyerr = "<b>Please Fill up the form properly!!!</b>";
                }
                else
                {
                    $newpass=$_POST['newpassword'];
                }

                if($_POST['currentpassword']!=$_SESSION['password'])
                {
                    $currenterr= "Please Enter The Current Password!!!";
                    echo"<center>";
                    echo"<br>";
                    echo"<b>";
                    echo" $currenterr";
                    echo"</b>";
                    echo"</center>";
                }
                else
                {
                    $current=$_POST['currentpassword'];
                }
                

                if($_POST['newpassword'] != $_POST['confirmpassword']) 
                {
                   
                    $passerr="<b> Your Password doesn't Match!!!</b>";
                }
                 else
                {
                    $newpass=$_POST['newpassword'];
                }

                if(strlen($_POST['newpassword']) <= 7) 
                {
                  
                    $passerr="<b>Password Must be minimum 8 character!!!</b>";
                }
                 else
                {
                    $newpass=$_POST['newpassword'];
                }
                if ( $emptyerr=="" && $passerr=="" && $currenterr== "")
                {
                    
                    
                    $stmt = $conn1->prepare("select Username,Password from users where Username= ? and Password= ?");
                    $stmt->bind_param("ss", $p1,$p2);
                    $p1=$_SESSION['user'];
                    $p2=$_SESSION['password'];
                    $stmt->execute();
                    $res2 = $stmt->get_result();
                    $user = $res2->fetch_assoc();

                    if($p1==$user['Username'] &&  $p2==$user['Password'])
                    {
                      
                        $stmt2  =mysqli_prepare($conn1,"update users set Password=? where Username= ? and Password= ?");
                        mysqli_stmt_bind_param($stmt2,"sss",$p5, $p3,$p4);
                        $p5=$_POST['newpassword'];
                        $p3=$_SESSION['user'];
                        $p4=$_SESSION['password'];;
                        $result = mysqli_stmt_execute($stmt2);
                        if($result)
                        {
                           
                            header("Location:ManagerLogIn.php");
              
                        }
                        else
                        {
                            echo"<br>";
                            echo"<b>";
                            echo "Failed to change";
                            echo"</b>";
                        }
                    }
                    else
                    {
                        echo"<br>";
                        echo" Your Username or password doesn't match";
                    }
                }
                mysqli_close($conn1);

            
                    
         

               
            }
           if($_SERVER['REQUEST_METHOD'] == "POST" && $_REQUEST['button'] == "Back") 
           {
                unset($_SESSION['user']);
                unset($_SESSION['password']); 
                  
                header("Location:ManagerLogIn.php");
            }
            
            
        ?>
        <br><br><br>
        <h3 align="center" style="color:Black"><big>CHANGE PASSWORD</big></h3>
        <p id="errorMsg"></p>
        <form name="passChangeForm" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']) ?>"onsubmit="return valid()" method="POST" align="center">
            
        Current Password:<br>
        <input type="password" name="currentpassword" placeholder="Current Password"><span id="currentPassword" class="required"></span>
        <br>
        <?php echo $emptyerr ?>
       
        
        
       
        <br>
        New Password:<br>
        <input type="password" name="newpassword" placeholder="New Password"><span id="newPassword" class="required"></span>
        <br>
         <?php echo $passerr ?>
        <br>
        Confirm Password:<br>
        <input type="password" name="confirmpassword" placeholder="Confirm Password"><span id="confirmPassword" class="required"></span>
        <br>
        
        <br><br>
        <input type="submit" value="Change Password" style="color:Black" name="button">
        <br>
        <br>
        <input type="submit" value="Back"  style="color:Black" name="button">

        <?php
         echo "<br>";
         echo "<br>";
         
        ?>
       
       
        </form>
    </body>
</html>