<?php
if(isset($_GET['p_id'])){
    $the_post_id = $_GET['p_id'];
}
    $query = "SELECT * FROM posts WHERE post_id = $the_post_id";
    $select_id_query = mysqli_query($connection,$query);
    while($row = mysqli_fetch_assoc($select_id_query)){
        $post_id = $row['post_id'];
        $post_category_id = $row['post_category_id'];
        $post_title = $row['post_title'];
        $post_author = $row['post_author'];
        $post_date = $row['post_date'];
        $post_image = $row['post_image'];
        $post_content = $row['post_content'];
        $post_tag = $row['post_tag'];
        $post_comment_count = $row['post_comment_count'];
        $post_status = $row['post_status'];
    }


if (isset($_POST['update'])){
    
    $post_category_ids = $_POST['post_category_id'];
    $post_titles = $_POST['post_title'];
    $post_authors = $_POST['post_author'];

    $post_image = $_FILES['image']['name'];
    $post_image_temp = $_FILES['image']['tmp_name'];
    
    $post_contents = $_POST['post_content'];
    $post_tags = $_POST['post_tag'];
    $post_comment_counts = $_POST['post_comment_count'];
    $post_statuss = $_POST['post_status'];

    move_uploaded_file($post_image_temp,"../image/$post_image");


    $query = "UPDATE posts SET post_category_id = $post_category_ids, post_title = '$post_titles', post_author = '$post_authors', post_date = now(), post_image = '$post_image', ";
    $query .= "post_content = '$post_contents', post_tag = '$post_tags', post_comment_count = $post_comment_counts, post_status='$post_statuss' WHERE post_id=$post_id ";
     $resultquery = mysqli_query($connection,$query);
     if($resultquery){
         echo "its ok";
         //header("Location: view_all_post.php");
     }
     else {
         echo "it is not working".mysqli_error($connection);
     }
    }
   

?>






<form action = "" method = "post" enctype ="multipart/form-data" >
        
        <div class="form-group">
        <select name = post_category_id>
        <?php
          $query = "SELECT * FROM category";
          $select_all_category = mysqli_query($connection,$query);
          while($row = mysqli_fetch_assoc($select_all_category)){
              $cat_id = $row['cat_id'];
              $cat_title = $row['cat_title'];
              echo "<option value = '$cat_id'>$cat_title</option>";
          }
        ?>
        
        </select>
           <!-- <input class = "form-control" type = "text" name= "post_category_id" value="<?php echo $post_category_id; ?>" >    -->
        </div>
        <div class="form-group">
            <input class = "form-control" type = "text" name= "post_title" value = "<?php echo $post_title; ?>" >
        </div>
        <div class="form-group">
            <input class = "form-control" type = "text" name= "post_author" value = "<?php echo $post_author; ?>" >
        </div>
        <div class="form-group">
            <input class = "form-control" type = "text" name= "post_date" value = "<?php echo $post_date; ?>" >
        </div>
        <div class="form-group">
        <input class = "form-control"  type = "file" name="image"  >
           <img width = "100px" src = "../image/<?php echo $post_image; ?>">
        </div>
        <div class="form-group">
            <textarea class = "form-control" type = "text" name= "post_content" cols = "40" rows = "10" ><?php echo $post_content; ?></textarea>
        </div>
        <div class="form-group">
            <input class = "form-control" type = "text" name= "post_tag" value = " <?php echo $post_tag; ?>">
        </div>
        <div class="form-group">
            <input class = "form-control" type = "text" name= "post_comment_count" value = "<?php echo $post_comment_count; ?>" >
        </div>
        <div class="form-group">
            <input class = "form-control" type = "text" name= "post_status" value = "<?php echo $post_status; ?>" >
        </div>

        <div class="form-group">
            <input class = "btn btn-primary" type = "submit" name= "update" value=  "update catagory">
        </div>
       </form>