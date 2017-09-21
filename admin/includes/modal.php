<?php
include "../../assets/libs/config.php";
include "../../assets/libs/database.php";
include "../../includes/functions.php";

$db = new Database();
?>
<?php
if(isset($_POST['edit']) ){
    $id = $_POST['edit'];
    $query = "SELECT * FROM categories";
    $category = $db->select($query);
//
    $select_category = "SELECT * FROM categories where category_id = '$id' ";
    $sel = $db->select($select_category);
    $row1 = $sel->fetch_array();
    ?>
    <div class="modal fade" id="myModal" role="dialog">
        <div class="modal-dialog">

            <!-- Modal content-->
            <div class="modal-content">
                <div class="modal-header">
<!--                    <button type="button" class="close" data-dismiss="modal">&times;</button>-->
                    <h4 class="modal-title" style="text-align: center">Edit Category</h4>
                </div>
                <div class="modal-body">
                    <form class="form" role="form" method="get" >
                        <input type="hidden" name="updateCategory" value="">
                        <input type="hidden" name="category_id" value="<?php echo $row1['category_id'];?>">

                        <div class="content">

                            <div class="input-group">
										<span class="input-group-addon">
											<i class="material-icons">account_balance</i>
										</span>
                                <input type="text" value="<?php echo $row1['title'];?>" name="category" class="form-control">
                            </div>
                        </div>
                    </form>
                    <div class="modal-footer">
                        <button style="margin: 5px" id="serialize" name="submit" class="btn btn-primary btn-md" onclick="update();">Update</button>
                        <button style="margin: 5px" type="button" class="btn btn-danger btn-md" data-dismiss="modal">Close</button>
                    </div>
                </div>
            </div>

        </div>
    </div>
<?php } ?>

<?php
if(isset($_POST['post']) ){
    $id = $_POST['post'];
    $query = "SELECT * FROM posts";
    $posts = $db->select($query);
//
    $select_post = "SELECT * FROM posts where post_id = '$id' ";
    $sel = $db->select($select_post);
    $row1 = $sel->fetch_array();
    ?>
    <div class="modal fade" id="myModal" role="dialog">
        <div class="modal-dialog">

            <!-- Modal content-->
            <div class="modal-content">
                <div class="modal-header">
                    <!--                    <button type="button" class="close" data-dismiss="modal">&times;</button>-->
                    <h4 class="modal-title" style="text-align: center">Edit Posts</h4>
                </div>
                <div class="modal-body">
                    <form class="form" role="form" method="get" >
                        <input type="hidden" name="updatePost" value="">
                        <input type="hidden" name="post_id" value="<?php echo $row1['post_id'];?>">

                        <div class="content">

                            <div class="input-group">
										<span class="input-group-addon">
											<i class="material-icons">account_balance</i>
										</span>
                                <input type="text" value="<?php echo $row1['title'];?>" name="post_title" class="form-control">
                            </div>

                            <div class="input-group">
										<span class="input-group-addon">

											<i class="material-icons">account_balance</i>
										</span>

                                <input type="text" value="<?php echo $row1['author'];?>" name="author" class="form-control">
                            </div>

                            <div class="input-group">
										<span class="input-group-addon">
											<i class="material-icons">account_balance</i>
										</span>
                                <textarea name="content" rows="6" cols="40"><?php echo $row1['content'];?></textarea>
                            </div>

                            <div class="input-group">
										<span class="input-group-addon">
											<i class="material-icons">account_balance</i>
										</span>
                                <input type="text" value="<?php echo $row1['tags'];?>" name="tags" class="form-control" >
                            </div>
                        </div>
                    </form>
                    <div class="modal-footer">
                        <button style="margin: 5px" id="serialize" name="submit" class="btn btn-primary btn-md" onclick="updatePost();">Update</button>
                        <button style="margin: 5px" type="button" class="btn btn-danger btn-md" data-dismiss="modal">Close</button>
                    </div>
                </div>
            </div>

        </div>
    </div>
<?php } ?>



