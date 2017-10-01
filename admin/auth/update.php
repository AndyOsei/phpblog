<?php
include "../../assets/libs/config.php";
include "../../assets/libs/database.php";
include "../../includes/functions.php";

$db = new Database();

//if(isset($_POST['updatePost']) ) {
////    var_dump($_GET);
//    $post_title = $_POST['post_title'];
//    $post_id = $_POST['post_id'];
//    $author = $_POST['author'];
//    $tags = $_POST['tags'];
//    $content = $_POST['content'];
//
//    $image = $_FILES['image']['name'];
//    $image_tmp = $_FILES['image']['tmp_name'];
//    move_uploaded_file($image_tmp,"../../assets/images/$image");
////    `image`='$image',
//
////    $query = "UPDATE `posts` SET `title`='$post_title', `content`='$content', `author`='$author', `image`='$image', `tags`='$tags'  WHERE `post_id` = '$post_id'";
//    $query = "INSERT INTO posts (title, content, author, image, tags)
//                    VALUES ('$post_title', '$content', '$author', '$image', '$tags') WHERE post_id = '$post_id' ";
//    $run = $db->update($query);
//    if($run){
//        echo 'http://localhost/phpblog/admin/index.php';
//    }
//}



if(isset($_GET['updateCategory']) ) {
    $category = $_GET['category'];
    $category_id = $_GET['category_id'];
    $query = "UPDATE `categories` SET `title`='$category'  WHERE `category_id` = '$category_id'";
    $run = $db->update($query);
    if($run){
        echo 'http://localhost/phpblog/admin/index.php';
    }
}
if(isset($_GET['updatePost']) ) {
//    var_dump($_GET);
    $post_title = $_GET['post_title'];
    $post_id = $_GET['post_id'];
    $author = $_GET['author'];
    $tags = $_GET['tags'];
    $content = $_GET['content'];
    $images = $_GET['image'];

    $image = $_FILES['image']['name'];
    $image_tmp = $_FILES['image']['tmp_name'];
    move_uploaded_file($image_tmp,"../../assets/images/$image");
//    `image`='$image',

//    $query = "UPDATE `posts` SET `title`='$post_title', `content`='$content', `author`='$author', `image`='$image', `tags`='$tags'  WHERE `post_id` = '$post_id'";
    $query = "INSERT INTO posts (title, content, author, image, tags) 
                    VALUES ('$post_title', '$content', '$author', '$image', '$tags') WHERE post_id = '$post_id' ";
    $run = $db->update($query);
    if($run){
        echo 'http://localhost/phpblog/admin/index.php';
    }
}
if(isset($_GET['EditUser']) ) {
    $username = $_GET['username'];
    $email = $_GET['email'];
    $password = $_GET['password'];
    $user_id = $_GET['user_id'];
    $query = "UPDATE `users` SET `username`='$username', `email`='$email', `password`=md5('$password')  WHERE `user_id` = '$user_id'";
    $run = $db->update($query);
    if($run){
        echo 'http://localhost/phpblog/admin/index.php';
    }
}

?>