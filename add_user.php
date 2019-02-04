

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
        if(isset($_POST['submit_user'])){
        
            $user_firstname =$_POST['user_firstname'];
            $user_lastname =$_POST['user_lastname'];
            $username =$_POST['username'];

            $user_date =date('d-m-y');

            //$post_image =$_FILES['image']['name'];
            //$post_image_temp =$_FILES['image']['tmp_name'];

            $user_role =$_POST['user_role'];
            $user_email =$_POST['user_email'];
            
            $user_password =$_POST['user_password'];

           // move_uploaded_file($post_image_temp,"../image/$post_image");

            $query = "INSERT INTO user(username,user_password,user_firstname,user_lastname,user_email,user_role)";
            $query .="VALUES('$username', '$user_password', '$user_firstname','$user_lastname','$user_email','$user_role' )";
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
            <input class = "form-control" type = "text" name= "user_firstname" placeholder = "user_firstname" >
        </div>
        <div class="form-group">
            <input class = "form-control" type = "text" name= "user_lastname" placeholder = "user_lastname" >
        </div>
        <div class="form-group">
            <input class = "form-control" type = "text" name= "username" placeholder = "username" >
        </div>
        <div class="form-group">
           <select name = "user_role">
              <option value = "subscriber">select option</option>
              <option value = "admin">Admin</option>
              <option value = "subscriber">subscriber</option>
           
            </select>
          
        </div>
        <div class="form-group">
            <input class = "form-control" type = "text" name= "user_email" placeholder = "user_email" >
        </div>
        <!--<div class="form-group">
         <input class = "form-control"  type = "file" name="image"  >
        </div>-->
        <div class = "form-group">
            <input class = "form-control" type = "text" name= "user_password"  placeholder = "user_password">
        </div>
       

        <div class="form-group">
            <input class = "btn btn-primary" type = "submit" name= "submit_user" value=  "add user">
        </div>
       </form>


       
        






       
    </div>
</div>
<!-- /.row -->

</div>

   <?php include "include/futter.php";?>