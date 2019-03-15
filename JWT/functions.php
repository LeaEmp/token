
<?php 
require_once("connect.php");
function generateToken($data, $new, $con){
	$header = [
        "alg"     => "HS256",
        "typ"     => "JWT",
        "dev"     => "lei"
        
    ];
    
    //*optional------------------------------------------------------------//
    $header = json_encode($header);
    $header = str_replace(['+', '/', '='], ['-', '_', ''], base64_encode($header));
    //----------------------------------------------------------------------//

    $query = "SELECT * FROM user_info WHERE id = '".$data."'";
    $result =  mysqli_query($con,$query);
    $row = mysqli_fetch_array($result);

    $payload = [
        "id"  => $row['id'],
        "uname"  =>  $row['username']
        
    ];

    $payload = json_encode($payload);
    $payload = str_replace(['+', '/', '='], ['-', '_', ''], base64_encode($payload));

    $signature = hash_hmac("SHA256", $header.".".$payload, base64_encode('secretkey'), true);
    $signature = str_replace(['+', '/', '='], ['-', '_', ''], base64_encode($signature));

    $jwt = "$header.$payload.$signature";
    return base64_encode($jwt);


}
 
    function validate($userToken){
    //validate token here

    $newToken = $_SESSION['jwt'];
    $data = $_SESSION['id'];
    token($data, $jwt, $con);

    function token($data, $userToken, $conn){

        $existingToken = generateToken($data, 1, $con);

        if($userToken == $existingToken){
            echo"Okay: $userToken";
        }else{
            echo"Error";
        }

    }
    }
    


    
 ?>
 	
