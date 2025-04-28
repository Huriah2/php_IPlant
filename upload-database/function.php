<?php 

function check_login($conn) {
    if (isset($_SESSION['user_id'])) {
        $id = $_SESSION['user_id'];
        $sql = "SELECT * FROM users WHERE user_id = ? LIMIT 1";
        $stmt = mysqli_prepare($conn, $sql);
        mysqli_stmt_bind_param($stmt, 's', $id);
        mysqli_stmt_execute($stmt);
        $result = mysqli_stmt_get_result($stmt);

        if ($result && mysqli_num_rows($result) > 0) {
            return mysqli_fetch_assoc($result); // Return user data
        }
    }
    return false; // User not logged in
}


 function random_num($length){

    $text = "";
    if($length < 5){
        $length = 5;
    }
    $len= rand(4,$length);

    for ($i=0; $i<$len;$i++){
        $text .= rand(0,9);

    }
    return $text;
 }