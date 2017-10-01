<?php session_start();
if(!isset($_SESSION['user_id'])){
    header("Location: login.php");
}
?>
<?php
  include "../assets/libs/config.php";
  include "../assets/libs/database.php";
  include "../includes/functions.php";

  $db = new Database();

  $query = "SELECT * FROM categories";
  $category = $db->select($query);

  if (isset($_POST['submit'])) {
      $title = $_POST['post_title'];
      $content = $_POST['content'];
      $cats = $_POST['category'];
      $author = $_POST['author_name'];
      $tags = $_POST['tags'];

      $image = $_FILES['image']['name'];
      $image_tmp = $_FILES['image']['tmp_name'];

      if($title == '' || $content == '' || $category == ''
          || $author == '' || $tags == ''){
            echo "Please fill in all the forms";
      }else{
          move_uploaded_file($image_tmp,"../assets/images/$image");
          $query = "INSERT INTO posts (category_id, title, content, author, image, tags) 
                    VALUES ('$cats', '$title', '$content', '$author', '$image', '$tags')";
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
          <a class="nav-link " href="index.php">Dashboard</a>
          <a class="nav-link active" href="add_post.php">Add New Post</a>
          <a class="nav-link" href="add_category.php">Add New Category</a>
            <a class="nav-link" href="add_user.php">Add User</a>
          <a class="nav-link pull-right" href="../index.php" target="_blank">View Blog</a>
          <a class="nav-link pull-right" href="logout.php">Log Out</a>
        </nav>
      </div>
    </div>

    <div class="container">

      <div class="row">
       <div class="col-sm-12 blog-main">

       <h2>Insert New Posts :</h2><hr>
       <form action="add_post.php" method="post" enctype="multipart/form-data">

         <div class="form-group" >
           <label>Post Title:</label>
           <input type="text" name="post_title" class="form-control" placeholder="Enter Post title">
         </div>

         <div class="form-group">
          <label>Post Content:</label>
          <textarea name="content" class="form-control" rows="3"></textarea>
         </div>

         <select name="category" class="form-control">
             <option>Select a category</option>
             <?php while ($row = $category->fetch_array()) : ?>
                <option value="<?php echo $row['category_id'];?>"><?php echo $row['title'];?></option>
             <?php endwhile; ?>
         </select>
         
         <div class="form-group">
             <br>
           <label>Author Name:</label>
           <input type="text" name="author_name" class="form-control" placeholder="Enter Author's name">
         </div>

         <div class="form-group">
           <label>Post Image:</label>
           <input type="file" name="image" class="form-control">
         </div>

         <div class="form-group">
           <label>Tags:</label>
           <input type="text" name="tags" class="form-control" placeholder= "Enter tags for blog post">
         </div>

         <input type="submit" name="submit" class="btn btn-success" value="submit">
           <a href="index.php" class="btn btn-danger">Cancel</a>
         <br>
       </form>
           <br>

       <?php include "includes/footer.php"; ?>
       
        

        