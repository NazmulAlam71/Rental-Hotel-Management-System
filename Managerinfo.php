<?php
  
    include('Database.php');


?>

 

<!DOCTYPE html>
<html>
<head>
    <title>Managerinfo</title>
   

</head>
<body>
    <h1 >user</h1>
    <form>
        <?php
            $sql = "SELECT * FROM users";
            $result = mysqli_query($conn1, $sql);
            if($result)
            {

 

                if(mysqli_num_rows($result) > 0)
                {
                    echo "<table class='center'>";
                    echo "<tr>";
                    echo "<th>username</th>";
                    echo "<th>password</th>";
                    echo "<th>email</th>";
                    echo "<th>nid</th>";
                    echo "</tr>";
                    while($row = mysqli_fetch_array($result))
                    {
                        echo "<tr>";
                        echo "<td>" . $row['user'] . "</td>";
                        echo "<td>" . $row['password'] . "</td>";
                        echo "<td>" . $row['email'] . "</td>";
                        echo "<td>" . $row['nid'] . "</td>";
                        echo "</tr>";
                    }    
            echo "</table>";
                }
            }

 


        ?>
        <br>
        <a href="home.php"><-Back</a>
    </form>

 


</body>
</html>