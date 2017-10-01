<?php session_start();
if(!isset($_SESSION['user_id'])){
    header("Location: login.php");
}
?>
<?php
include "../assets/libs/config.php";
include "../assets/libs/database.php";
include "../includes/functions.php";

//creating database object
$db = new Database();

//inserting categories into database
if (isset($_POST['submit'])){

    $title = $_POST['category_title'];

    if ($title == '' ){
        echo 'Please Fill in all the fields';
    }else{
        $query = "INSERT INTO categories (title)  VALUES ('$title')";
        $run = $db->insert($query);
    }
}




?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="../../../../favicon.ico">

    <title>Admin Panel</title>

    <!-- Bootstrap core CSS -->
    <link href="../assets/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom styles for this blog -->
    <link href="../assets/styles/blog.css" rel="stylesheet">
</head>

<body>

<div class="blog-masthead">
    <div class="container">
        <nav class="nav">
            <a class="nav-link" href="index.php">Dashboard</a>
            <a class="nav-link" href="add_post.php">Add New Post</a>
            <a class="nav-link active" href="add_category.php">Add New Category</a>
            <a class="nav-link " href="add_user.php">Add User</a>
            <a class="nav-link pull-right" href="../index.php" target="_blank">View Blog</a>
            <a class="nav-link pull-right" href="logout.php">Log Out</a>
        </nav>
    </div>
</div>

<div class="container">

    <div class="row">
        <div class="col-sm-12 blog-main">

            <h2>Add New Category :</h2><hr>
            <form action="add_category.php" method="post">
                <div class="form-group">
                    <label>Category Title:</label>
                    <input type="text" name="category_title" class="form-control" placeholder="Enter Category title" required>
                </div>

                <input type="submit" name="submit" class="btn btn-success" value="submit">
                <a href="index.php" class="btn btn-danger">Cancel</a>
                <br>
            </form>
            <br>

            <?php include "includes/footer.php"; ?>



