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

  $query = "SELECT * FROM posts";
  $posts = $db->select($query);

  $query = "SELECT * FROM categories";
  $category = $db->select($query);

  $query = "SELECT * FROM users";
  $users = $db->select($query);
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="#">

    <title>Admin Panel</title>
      <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons" />
      <link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700" />
      <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css" />
      <link href="../assets/styles/material-kit.css" rel="stylesheet"/>

    <!-- Bootstrap core CSS -->
    <link href="../assets/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom styles for this blog -->
    <link href="../assets/styles/blog.css" rel="stylesheet">


      <!-- CSS Just for demo purpose, don't include it in your project -->
      <link href="../assets/styles/demo.css" rel="stylesheet" />
      <link href="../assets/css/sweetalert.css" rel="stylesheet"/>
  </head>

  <body>
  <div id="modal"></div>

    <div class="blog-masthead">
      <div class="container">
        <nav class="nav">
          <a class="nav-link active" href="index.php">Dashboard</a>
          <a class="nav-link" href="add_post.php">Add New Post</a>
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
        <table class="table table-striped">
          <tr align="center">
            <td colspan="4"><h3>Manage Your Posts:</h3></td>
          </tr>
          <tr>
            <th>Post Title</th>
            <th>Post Author</th>
            <th>Post Date</th>
              <th></th>
              <th></th>
          </tr>
          <?php while($row = $posts->fetch_array()) : ?>
          <tr>

            <td>
              <a href="edit_post.php?id=<?php echo $row['post_id'];?>">
              <?php echo $row['title']; ?></a>
            </td>
            <td><?php echo $row['author']; ?></td>
            <td><?php echo formatDate($row['date']); ?></td>
              <td>
                  <button class="custom"  onclick="editPost(<?php echo $row['post_id']; ?>)">Edit</button>
                  <button class="custom" ><a href="#"  onclick="confirm(<?php echo $row['post_id'];?>,'Post' );" >Delete</a></button>
              </td>
          </tr>
          <?php endwhile; ?>
        </table> <br>

        <table class="table table-striped">
          <tr align="center">
            <td colspan="4"><h3>Manage Your Categories:</h3></td>
          </tr>
          <tr>
              <th>Category Title</th>
              <th></th>
              <th></th>
              <th></th>
          </tr>
          <?php while($row = $category->fetch_array()) : ?>
          <tr>
            <td>
              <a href="edit_post.php?id=<?php echo $row['category_id'];?>">
              <?php echo $row['title']; ?></a>
            </td>
              <td>

                  <button class="custom"  onclick="editCategory(<?php echo $row['category_id']; ?>)">Edit</button>
                  <button class="custom" ><a href="#"  onclick="confirm(<?php echo $row['category_id'];?>,'Category' );" >Delete</a></button>
              </td>
          </tr>
          <?php endwhile; ?>
        </table><br>

           <table class="table table-striped">
               <tr align="center">
                   <td colspan="4"><h3>Manage Users:</h3></td>
               </tr>
               <tr>
                   <th>User Name</th>
                   <th>User Email</th>
                   <th></th>


               </tr>
               <?php while($row = $users->fetch_array()) : ?>
                   <tr>
                       <td>
                           <a href="#">
                               <?php echo $row['username']; ?>
                           </a>
                       </td>
                       <td>
                           <p><?php echo $row['email']; ?></p>
                       </td>
                       <td>

                           <button class="custom"  onclick="editUser(<?php echo $row['user_id']; ?>)">Edit</button>
                           <button class="custom" ><a href="#"  onclick="confirm(<?php echo $row['user_id'];?>,'User' );" >Delete</a></button>
                       </td>
                   </tr>
               <?php endwhile; ?>
           </table>





        