
<?php
if(isset($_GET['p_id'])){
    $edit_id = $_GET['p_id'];
}
    $query = "SELECT * FROM comments WHERE comments_id = $edit_id";
    $edit_comment = mysqli_query($connection,$query);
    while($row = mysqli_fetch_assoc($edit_comment)){
        $comment_post_id = $row['comment_post_id'];
        $comment_author = $row['comment_author'];
        $comment_email = $row['comment_email'];
        $comment_content = $row['comment_content'];
        $comment_status = $row['comment_status'];
        $comment_date = $row['comment_date'];
        
        

    
   
}

if(isset($_POST['update'])){
        $comment_post_ids = $_POST['comment_post_id'];
        $comment_authors = $_POST['comment_author'];
        $comment_emails = $_POST['comment_email'];
        $comment_contents = $_POST['comment_content'];
        $comment_statuss = $_POST['comment_status'];
        $comment_dates = $_POST['comment_date'];
        $query = "UPDATE comments SET comment_post_id =$comment_post_ids, comment_author = '$comment_authors',comment_email = '$comment_emails', comment_content = '$comment_contents', ";
        $query .= "comment_status = '$comment_statuss',comment_date =$comment_dates WHERE comments_id = $edit_id";
        $update_query = mysqli_query($connection,$query);
        if(!$update_query){
            echo "query faild".mysqli_error($connection);
        }
}
?>

<form action="" method ="post">
        <div class="form-group">
            <input type = "text" name = "comment_post_id" class = "form-control" value="<?php echo $comment_post_id; ?>">
        </div>
        <div class="form-group">
            <input type = "text" name = "comment_author"  class = "form-control" value="<?php echo $comment_author; ?>" >
        </div>
        <div class="form-group">
            <input type = "text" name = "comment_email"  class = "form-control" value="<?php echo $comment_email; ?>" >
        </div>
        <div class="form-group">
            <input type = "text" name = "comment_content"  class = "form-control" value="<?php echo $comment_content; ?>">
        </div>
        <div class="form-group">
            <input type = "text" name = "comment_status"  class = "form-control" value="<?php echo $comment_status; ?>">
        </div>
        <div class="form-group">
            <input type = "text" name = "comment_date"  class = "form-control" value="<?php echo $comment_date; ?>">
        </div>
        <input type="submit" class="btn btn-primary" name = "update" value = "Submit">
    </form>