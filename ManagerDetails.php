<?php
  session_start();
?>
<?php
        $f1 = fopen("Managerinfo.txt", "r");
        
        $data = fread($f1, filesize("Managerinfo.txt"));

        $data_filter = explode("\n", $data);
        
        for($i = 0; $i< count($data_filter)-1; $i++) {
            
            $json_decoded = json_decode($data_filter[$i], true);
            

            if($json_decoded['user'] == $_SESSION['user'] && $json_decoded['password'] ==$_SESSION['password']) 
            {
                $_SESSION['fname']=$json_decoded['firstname'];
                $_SESSION['lname']=$json_decoded['lastname'];
                $_SESSION['dob']=$json_decoded['DOB'];
                $_SESSION['nid']=$json_decoded['NID'];
                $_SESSION['address']=$json_decoded['address'];
                $_SESSION['phone']=$json_decoded['phone'];
                $_SESSION['email']=$json_decoded['email'];
                $_SESSION['Recemail']=$json_decoded['Remail'];


                echo "User Name: ". $_SESSION['user']."<br>";
               // echo "Password: ". $_SESSION['password']."<br>";
                echo "First Name: ". $_SESSION['fname']."<br>";
                echo "Last Name: ". $_SESSION['lname']."<br>";
                echo "Date of Birth: ". $_SESSION['dob']."<br>";
                echo "NID: ". $_SESSION['nid']."<br>";
                echo "Address: ". $_SESSION['address']."<br>";
                echo "Email: " .$_SESSION['email']."<br>";
                echo "Recovary Email: " .$_SESSION['Recemail']."<br><br><br><br>";
                //echo "<a href='logout.php'>Logout</a>"."<br><br>";
                
                
            }

        }
        fclose($f1);

?>




