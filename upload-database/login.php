<?php
session_start();

    include 'db_conf.php';
    include 'function.php';

if($_SERVER['REQUEST_METHOD']== "POST"){

    $user_name= $_POST['user_name'];
    $password= $_POST['password'];

    if (!empty($user_name) && !empty($password) && !is_numeric($user_name)) {
        // Use prepared statements to prevent SQL injection
        $sql = "SELECT user_id, user_name, password FROM users WHERE user_name = ? LIMIT 1";
        $stmt = mysqli_prepare($conn, $sql);
        
        // Bind the parameters
        mysqli_stmt_bind_param($stmt, 's', $user_name);
        
        // Execute the statement
        mysqli_stmt_execute($stmt);
        
        // Get the result
        $result = mysqli_stmt_get_result($stmt);
    
        if ($result) {
            if (mysqli_num_rows($result) > 0) {
                $user_data = mysqli_fetch_assoc($result);
                
                // Use password verification function
                if ($user_data['password'] === $password) {
                    $_SESSION['user_id'] = $user_data['user_id'];
                    header("Location: index.php");
                    exit;
                }
            }
        }
        
        echo "Incorrect password or username!";
    } else {
        echo "Please enter some valid information!";
    }
}    


?>

<!DOCTYPE html>
<html>
<head>
    <title>Login</title>
</head>
<body>
    <style type="text/css">
        #text{
            height: 25px;
            border-radius:5px;
            padding: 4px;
            border: solid thin #aaa;
            width: 100%;

        }

        #button{
            padding: 10px;
            width: 100px;
            color: white;
            background-color: lightblue;
            border: none;
        }

        #box{
            background-color: grey;
            margin: auto;
            width: 300px;
            padding: 20px;
        }

    </style>

    <div id ="box">
        <form method="post">
            <div style="font-size: 20px; margin: 10px; color:white;">Login</div>
            <input id="text" type="text" name="user_name"><br></br>
            <input id="text"  type="password" name="password"><br></br>

            <input id="button"  type="submit" value="Login"><br></br>

            <a href=" signup.php">Click to Signup</a><br></br>

        </form>
    </div>

</body>
</html>