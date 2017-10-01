<?php
  $query = "SELECT * FROM categories";
  $category = $db->select($query);
?>
<div class="col-sm-3 offset-sm-1 blog-sidebar">
<!-- <div class="col-lg-3 offset-lg-1 blog-sidebar"> -->
          <div class=" sidebar-module sidebar-module-inset">
            <h4>Who we are</h4>
            <p>We are an organisation dedicated to educating and introducing technology
                enthusiast about simple neat tricks in <em>Web Programming</em>
            </p>
          </div>
          <div class="sidebar-module">
            <h4>Categories</h4>
            <ol class="list-unstyled">
            <?php while($row = $category->fetch_array()) :?>
              <li><a href="category.php?id=<?php echo $row['category_id']; ?>" ><?php echo $row['title']; ?></a></li>
            <?php endwhile; ?>
            </ol>
          </div>
          
        </div> <!--.blog-sidebar -->

        </div><!-- /.row -->

    </div><!-- /.container -->

   
