<?php include "include/header.php";?>

    <div id="wrapper">

        <!-- Navigation -->
        <?php include "include/navigation.php";?>
        <div id="page-wrapper">

<div class="container-fluid">

    <!-- Page Heading -->
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">
                Welcome to
                <?php echo $_SESSION['username']; ?>
                <small><?php echo $_SESSION['username']; ?></small>
            </h1>
           
        </div>
    </div>

    <!-- /.row -->
           
                <!-- /.row -->
                
<div class="row">
    <div class="col-lg-3 col-md-6">
        <div class="panel panel-primary">
            <div class="panel-heading">
                <div class="row">
                    <div class="col-xs-3">
                        <i class="fa fa-file-text fa-5x"></i>
                    </div>
                    <div class="col-xs-9 text-right">

                            <?php 
                                $query = "SELECT * FROM posts";
                                $select_all_post = mysqli_query($connection,$query);
                                $post_count = mysqli_num_rows($select_all_post);
                                echo "<div class='huge'>{$post_count}</div>";
                            ?>

                  
                        <div>Posts</div>
                    </div>
                </div>
            </div>
            <a href="./view_all_post.php">
                <div class="panel-footer">
                    <span class="pull-left">View Details</span>
                    <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                    <div class="clearfix"></div>
                </div>
            </a>
        </div>
    </div>
    <div class="col-lg-3 col-md-6">
        <div class="panel panel-green">
            <div class="panel-heading">
                <div class="row">
                    <div class="col-xs-3">
                        <i class="fa fa-comments fa-5x"></i>
                    </div>
                    <div class="col-xs-9 text-right">

                            <?php 
                                $query = "SELECT * FROM comments";
                                $select_all_user = mysqli_query($connection,$query);
                                $comment_count = mysqli_num_rows($select_all_user);
                                echo "<div class='huge'>{$comment_count}</div>";
                            ?>


                     
                      <div>Comments</div>
                    </div>
                </div>
            </div>
            <a href="comment.php">
                <div class="panel-footer">
                    <span class="pull-left">View Details</span>
                    <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                    <div class="clearfix"></div>
                </div>
            </a>
        </div>
    </div>
    <div class="col-lg-3 col-md-6">
        <div class="panel panel-yellow">
            <div class="panel-heading">
                <div class="row">
                    <div class="col-xs-3">
                        <i class="fa fa-user fa-5x"></i>
                    </div>
                    <div class="col-xs-9 text-right">

                             <?php 
                                $query = "SELECT * FROM user";
                                $select_all_user = mysqli_query($connection,$query);
                                $user_count = mysqli_num_rows($select_all_user);
                                echo "<div class='huge'>{$user_count}</div>";
                            ?>

                    
                        <div> Users</div>
                    </div>
                </div>
            </div>
            <a href="user.php">
                <div class="panel-footer">
                    <span class="pull-left">View Details</span>
                    <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                    <div class="clearfix"></div>
                </div>
            </a>
        </div>
    </div>
    <div class="col-lg-3 col-md-6">
        <div class="panel panel-red">
            <div class="panel-heading">
                <div class="row">
                    <div class="col-xs-3">
                        <i class="fa fa-list fa-5x"></i>
                    </div>
                    <div class="col-xs-9 text-right">

                            <?php 
                                $query = "SELECT * FROM category";
                                $select_all_catagory = mysqli_query($connection,$query);
                                $category_count = mysqli_num_rows($select_all_catagory);
                                echo "<div class='huge'>{$category_count}</div>";
                            ?>

                        
                         <div>Categories</div>
                    </div>
                </div>
            </div>
            <a href="catagory.php">
                <div class="panel-footer">
                    <span class="pull-left">View Details</span>
                    <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                    <div class="clearfix"></div>
                </div>
            </a>
        </div>
    </div>
</div>
                <!-- /.row -->




<div class="row"> 
<script type="text/javascript">
      google.charts.load('current', {'packages':['bar']});
      google.charts.setOnLoadCallback(drawChart);

      function drawChart() {
        var data = google.visualization.arrayToDataTable([
          ['data', 'count'],
            <?php
                $elemont_text = ['Post','category','comment','user'];
                $elemont_count = [$post_count,$category_count,$comment_count,$user_count];

                for($i = 0; $i<4;$i++){
                    echo "['$elemont_text[$i]'".","."$elemont_count[$i]],";
                }

            ?>

        //  ['post', 1000],
          
          
        ]);

        var options = {
          chart: {
            title: '',
            subtitle: '',
          }
        };

        var chart = new google.charts.Bar(document.getElementById('columnchart_material'));

        chart.draw(data, google.charts.Bar.convertOptions(options));
      }
    </script>
   <div id="columnchart_material" style="width:'auto'; height: 500px;"></div>
   </div>


       <?php include "include/futter.php";?>