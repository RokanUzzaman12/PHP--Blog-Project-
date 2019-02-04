

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
            Blank Page
            <small>Subheading</small>
        </h1>

      <?php 
        if(isset($_POST['submit'])){
        
            $post_category_id =$_POST['post_category_id'];
            $post_title =$_POST['post_title'];
            $post_author =$_POST['post_author'];

            $post_date =date('d-m-y');

            $post_image =$_FILES['image']['name'];
            $post_image_temp =$_FILES['image']['tmp_name'];

            $post_content =$_POST['post_content'];
            $post_tag =$_POST['post_tag'];
            
            $post_status =$_POST['post_status'];

            move_uploaded_file($post_image_temp,"../image/$post_image");

            $query = "INSERT INTO posts(post_category_id, post_title, post_author, post_date, post_image, post_content, post_tag, post_status)";
            $query .="VALUES($post_category_id, '$post_title', '$post_author',now(),'$post_image','$post_content','$post_tag','$post_status' )";
            $result = mysqli_query($connection,$query);
            if($result){
                echo "good";
            }
            else {
                die('query faild'.mysqli_error($connection));
            } 


           
        
        }
      ?>


       <form action = "" method = "post" enctype ="multipart/form-data" >
        
        <div class="form-group">
        select a category:<br>
            <select name = "post_category_id">
                    <?php
                    $query = "SELECT * FROM category";
                    $select_all_category = mysqli_query($connection,$query);
                    while($row = mysqli_fetch_assoc($select_all_category)){
                        $cat_id = $row['cat_id'];
                        $cat_title = $row['cat_title'];
                        echo "<option value = $cat_id>$cat_title</option>";
                        
                    }
                    
                    

                ?>
            <select>
      
            
        </div>
        <div class="form-group">
            <input class = "form-control" type = "text" name= "post_title" placeholder = "post_title" >
        </div>
        <div class="form-group">
            <input class = "form-control" type = "text" name= "post_author" placeholder = "post_author" >
        </div>
     
        <div class="form-group">
            <input class = "form-control"  type = "file" name="image"  >
        </div>
        <div class="form-group">
            <textarea class = "form-control" type = "text" name= "post_content" cols = "40" rows = "10" placeholder = "post_content" ></textarea>
        </div>
        <div class="form-group">
            <input class = "form-control" type = "text" name= "post_tag"  placeholder = "post_tag">
        </div>
        <div class="form-group">
            <input class = "form-control" type = "text" name= "post_status" placeholder = "post_status" >
        </div>

        <div class="form-group">
            <input class = "btn btn-primary" type = "submit" name= "submit" value=  "add post">
        </div>
       </form>


       
        






       
    </div>
</div>
<!-- /.row -->

</div>

   <?php include "include/futter.php";?>