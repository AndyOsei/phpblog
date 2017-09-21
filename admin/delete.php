<?php
include "../assets/libs/config.php";
include "../assets/libs/database.php";
include "../includes/functions.php";

$db = new Database();

$delete = $_POST['name'];
//echo "David";
    if($delete == "Post") {
        $id = $_POST['id'];
        $query = "DELETE FROM posts WHERE post_id = '$id'";
        $run = $db->delete($query);
        if($run){
            echo 'http://localhost/phpblog/admin/index.php';
        }
    }else if($delete == "Category"){
        $id = $_POST['id'];
        $query = "DELETE FROM categories WHERE category_id = '$id'";
        $run = $db->delete($query);
        if($run){
            echo 'http://localhost/phpblog/admin/index.php';
        }
    }


?>