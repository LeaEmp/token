<?php 
	
    require_once("connect.php");
    require_once("functions.php"); 
    

    $username = $_POST['username'];
    $password = $_POST['password'];
    

        $query = "SELECT *  FROM user_info where username='".$username."' and password='".$password."'"; 
        $result = mysqli_query($con,$query);
        $count = mysqli_num_rows($result);

        if($count ==1){
            $query2 = "SELECT * FROM user_info WHERE username='".$username."' and password='".$password."'";
            $result =  mysqli_query($con,$query);
            $row = mysqli_fetch_array($result);

            $data = $row['id'];
            $newToken = generateToken($data, 0, $con);
            $existingToken = generateToken($data, 1, $con);

            echo"$newToken <br> $existingToken";
            

        }else{
            echo "failed";
        }
  
    



?>
