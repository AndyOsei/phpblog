<?php
include "../../assets/libs/config.php";
include "../../assets/libs/database.php";
include "../../includes/functions.php";

$db = new Database();
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
    $post_title = $_GET['post_title'];
    $post_id = $_GET['post_id'];
    $author = $_GET['author'];
    $tags = $_GET['tags'];
    $content = $_GET['content'];
    $query = "UPDATE `posts` SET `title`='$post_title', `content`='$content', `author`='$author', `tags`='$tags'  WHERE `post_id` = '$post_id'";
    $run = $db->update($query);
    if($run){
        echo 'http://localhost/phpblog/admin/index.php';
    }
}

?>