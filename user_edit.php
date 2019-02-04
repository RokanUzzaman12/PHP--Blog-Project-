<?php
if(isset($_GET['p_id'])){
    $user_id = $_GET['p_id'];
}
    $query = "SELECT * FROM user WHERE user_id = $user_id";
    $select_user = mysqli_query($connection,$query);
    while($row = mysqli_fetch_assoc($select_user)){
        $user_id = $row['user_id'];
        $username = $row['username'];
        $user_password = $row['user_password'];
        $user_firstname = $row['user_firstname'];
        $user_lastname = $row['user_lastname'];
        //$post_image = $row['post_image'];
        $user_email = $row['user_email'];
        $user_role = $row['user_role'];
       
    }


if (isset($_POST['update'])){
    
    $usernames = $_POST['username'];
    $user_passwords = $_POST['user_password'];
    $user_firstnames = $_POST['user_firstname'];
    $user_lastname = $_POST['user_lastname'];

    //$post_image = $_FILES['image']['name'];
   // $post_image_temp = $_FILES['image']['tmp_name'];
    
    $user_email = $_POST['user_email'];
    $user_role = $_POST['user_role'];
    
    

    //move_uploaded_file($post_image_temp,"../image/$post_image");


    $query = "UPDATE user SET username = '$usernames', user_password = '$user_passwords', user_firstname = '$user_firstnames', user_lastname = '$user_lastname', ";
    $query .= "user_email = '$user_email', user_role = '$user_role' WHERE user_id = $user_id";
     $resultquery = mysqli_query($connection,$query);
     if($resultquery){
         echo "its ok";
         header("Location: user.php?source=user_edit&p_id=$user_id");
     }
     else {
         echo "it is not working".mysqli_error($connection);
     }
    }
   

?>






<form action = "" method = "post" enctype ="multipart/form-data" >
        
        <div class="form-group">
            <input class = "form-control" type = "text" name= "username" value="<?php echo $username; ?>" >
        </div>
        <div class="form-group">
            <input class = "form-control" type = "text" name= "user_password" value = "<?php echo $user_password; ?>" >
        </div>
        <div class="form-group">
           <select name = "user_role">

        
              <option value = 'subscriber'><?php echo $user_role;?></option>

              <?php
              if($user_role == 'admin'){
                  echo "<option value = 'subscriber'>Subscriber</option>";
              }
              else{
                    echo "<option value = 'admin'>Admin</option>";
              }
              
              ?>
              
              
           
            </select>
          
        </div>
        <div class="form-group">
            <input class = "form-control" type = "text" name= "user_firstname" value = "<?php echo $user_firstname; ?>" >
        </div>
        <div class="form-group">
            <input class = "form-control" type = "text" name= "user_lastname" value = "<?php echo $user_lastname; ?>" >
        </div>
        
        <div class="form-group">
            <input class = "form-control" type = "text" name= "user_email" value = "<?php echo $user_email; ?>">
        </div>
        <div class="form-group">
            <input class = "form-control" type = "text" name= "user_role" value = " <?php echo $user_role; ?>">
        </div>
    

        <div class="form-group">
            <input class = "btn btn-primary" type = "submit" name= "update" value=  "update user">
        </div>
       </form>