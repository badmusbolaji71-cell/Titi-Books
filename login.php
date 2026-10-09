<?php
// include("user_sign_uo.php");
session_start();
$email = $password = "";
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "titi books";
$connection = new mysqli($servername,$username,$password , $dbname);
if(isset($_POST["submit"])){
    $email = $_POST["email"];
    $password = $_POST["password"];
if(empty($email) || empty($password)){
    echo "All must be filled";
}
$login = mysqli_query($connection,"SELECT*FROM admin_sign_upp where email = '$email' AND password = '$password'");

$login_uem= mysqli_query($connection,"SELECT*FROM user_sign_up where email = '$email' AND password = '$password'");

if(mysqli_num_rows($login) > 0 ){
    $_SESSION['email'] = $email;
    header("location:index.php");
    exit();
}
elseif( mysqli_num_rows($login_uem) > 0 ){
    $user = mysqli_fetch_assoc($login_uem); 
    $id = (int)$user['id'];
    header("location:index_of_user.php");
        exit();
    }
    

else{
    echo "No record found";
}
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        body{
        display:grid;
        justify-content:center;
        align-items:center;
          background-color:indigo;
}
#form{
       display:grid;
        justify-content:center;
        align-items:center;
        gap:40px;
         background-color: #0babf5;
         border:3px solid white;
         margin:10px;
         padding-top:20px;
         padding-bottom:20px;
         padding-right:20px;
         padding-left:20px;
         border-radius:20px;
}
input{
    height:35px;
    border:3px solid white;
    border-radius:15px;
 background-color: #444f92;
}

    </style>
</head>
<body>
    <center>Sign in</center>
    <form  method="post" id = "form">
        <label for="">Email:
            <input type="email" name="email" id="">
        </label>
        <label for="password">Password:
            <input type="password" name="password" id="">
        </label>
        <input type="submit" value="submit" name = "submit">
        
    </form>
</body>
</html>