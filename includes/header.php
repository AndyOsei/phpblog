<?php 
  include "assets/libs/config.php";
  include "assets/libs/database.php";
  include "includes/functions.php";

  $db = new Database();
  $query = "SELECT * FROM posts ORDER BY post_id DESC";
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
        <?php while($row = $posts->fetch_array()) :?>
          <div class="blog-post">
            <h2 class="blog-post-title"><?php echo $row['title']; ?></h2>
            <p class="blog-post-meta">posted on <?php echo formatDate($row['date']); ?> by <a href="#"><?php echo $row['author']; ?></a></p>
               <img style="float: left; margin-right: 20px; margin-bottom: 10px;" src="assets/images/<?php echo $row['image']; ?>" width="200px" height="150px">

            <p style="text-align: justify;"><?php echo substr($row['content'], 0, 300); ?></p>
            <a id="readmore" href="single_post.php?id=<?php echo $row['post_id']; ?> ">Read More</a>
          </div><!-- /.blog-post -->
        <?php endwhile; ?>

        </div><!-- /.blog-main -->
       

        