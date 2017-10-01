<?php session_start();

include "../../assets/libs/config.php";
include "../../assets/libs/database.php";

$db = new Database();

$location = 'dashboard.php';
$redirect = 'login.php';
if($_POST['email'] == '' || $_POST['password'] == ''){
    $_SESSION['error'] = "empty";
    $redirect = 'http://localhost/phpblog/admin/login.php';
    header("Location: $redirect");
}else{
    $password = $_POST["password"];
    $email = $_POST["email"];

    $query = "SELECT user_id, email, password FROM users WHERE email = '$email' AND password = md5('$password') ";
    $run = $db->select($query);
    $row = $run->fetch_array();
    if($row > 0) {
        $user_id = $row['user_id'];
        $_SESSION = ['user_id' => $user_id];
        $location = 'http://localhost/phpblog/admin/index.php';
        header("Location: $location");
    }else{
        $_SESSION['error'] = "mismatch";
        $redirect = 'http://localhost/phpblog/admin/login.php';
        header("Location: $redirect");
    }

}