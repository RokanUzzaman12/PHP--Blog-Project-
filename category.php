<?php include 'include/db.php';?>

<?php include 'include/header.php';?>

    <!-- Navigation -->
    <?php include 'include/navigation.php';?>

    <!-- Page Content -->
    <div class="container">

        <div class="row">

            <!-- Blog Entries Column -->
            <div class="col-md-8">

            <?php
                if(isset($_GET['category'])){
                  $category_id = $_GET['category'];
                }
            ?>

                <?php
                    $query = "SELECT * FROM posts WHERE post_category_id = $category_id";
                    $all_posts = mysqli_query($connection,$query);
                    while($row = mysqli_fetch_assoc($all_posts)){
                        $post_id = $row['post_id'];
                        $post_title = $row['post_title'];
                        $post_author = $row['post_author'];
                        $post_date = $row['post_date'];
                        $post_content = $row['post_content'];
                        $post_image = $row['post_image'];
                        $post_status = $row['post_status'];
                         
                        if($post_status !== "published"){
                            echo "<h1> No Post </h1>";
                        }
                        else{

                            ?>
                         
                         
                         <h1 class="page-header">
                    Page Heading
                    <small>Secondary Text</small>
                </h1>

                <!-- First Blog Post -->
                <h2>
                    <a href="post.php?p_id=<?php echo $post_id; ?>"><?php echo $post_title; ?></a>
                </h2>
                <p class="lead">
                    by <a href="post.php?p_id=<?php echo $post_id; ?>"><?php echo $post_author; ?></a>
                </p>
                <p><span class="glyphicon glyphicon-time"></span><?php echo $post_date; ?></p>
                <hr>
                <a href="post.php?p_id=<?php echo $post_id; ?>"><img class="img-responsive" src="image/<?php echo $post_image?>" alt=""></a>
                <hr>
                <p><?php echo $post_content; ?></p>
                <a class="btn btn-primary" href="#">Read More <span class="glyphicon glyphicon-chevron-right"></span></a>

                <hr>






               <?php     } } ?>

               

              

                <!-- Second Blog Post -->
         

                <!-- Third Blog Post -->
 

                <!-- Pager -->
                <ul class="pager">
                    <li class="previous">
                        <a href="#">&larr; Older</a>
                    </li>
                    <li class="next">
                        <a href="#">Newer &rarr;</a>
                    </li>
                </ul>

            </div>

            <!-- Blog Sidebar Widgets Column -->
            <div class="col-md-4">

                <!-- Blog Search Well -->
             

            <?php include 'include/sidebar.php';?>


        </div>
        <!-- /.row -->

        <hr>

        <!-- Footer -->

<?php include 'include/futter.php';?>