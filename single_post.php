<?php 
  include "assets/libs/config.php";
  include "assets/libs/database.php";
  include "includes/functions.php";

  $db = new Database();
  $id = $_GET['id'];
  $query = "SELECT * FROM posts WHERE post_id = '$id' ";
  $posts = $db->select($query);
  
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="../../../../favicon.ico">

    <title>PHP Blog</title>

    <!-- Bootstrap core CSS -->
    <link href="assets/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom styles for this blog -->
    <link href="assets/styles/blog.css" rel="stylesheet">
  </head>

  <body>

    <div class="blog-masthead">
      <div class="container">
        <nav class="nav">
          <a class="nav-link active" href="index.php">Home</a>
          <a class="nav-link" href="#">All Posts</a>
          <a class="nav-link" href="#">Services</a>
          <a class="nav-link" href="#">About</a>
          <a class="nav-link" href="#">Contact</a>
        </nav>
      </div>
    </div>

    <div class="blog-header">
      <div class="container">
        <h1 class="blog-title">PHP Tutorials Blog</h1>
        <p class="lead blog-description">All about PHP tutorials, news and guides.</p>
      </div>
    </div>

    <div class="container">

      <div class="row">
       <div class="col-sm-8 blog-main">
        <?php $row = $posts->fetch_array(); ?>
          <div class="blog-post">
            <h2 class="blog-post-title"><?php echo $row['title']; ?></h2>
            <p class="blog-post-meta">posted on <?php echo formatDate($row['date']); ?> by <a href="#"><?php echo $row['author']; ?></a></p>
               <img style="float: left; margin-right: 20px; margin-bottom: 10px;" src="assets/images/<?php echo $row['image']; ?>" width="500px" height="300px">
            <hr>
            <p style="text-align: justify;"><?php echo $row['content']; ?></p>
          </div><!-- /.blog-post -->

        </div><!-- /.blog-main -->
      <?php
        include "includes/sidebar.php";
        include "includes/footer.php";
      ?>

        