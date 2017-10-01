<?php session_start();
$_SESSION['user_id'] == null;

// remove all session variables
session_unset();

// destroy the session
session_destroy();

if(($_SESSION['user_id']) == null){
    header("Location: login.php");
}