<form action = "" method = "post">
                <div class="form-group">


                    <?php
                        if(isset($_GET['edit'])){
                            $cat_id =$_GET['edit'];
                            $query = "SELECT * FROM category WHERE cat_id = $cat_id";
                            $result_query_id = mysqli_query($connection,$query);
                            while($row = mysqli_fetch_assoc($result_query_id)){
                            $cat_id = $row['cat_id'];
                            $cat_title = $row['cat_title'];
                    ?>

                                <input value = "<?php if(isset($cat_title)){echo $cat_title;} ?>" type = "text" class = "form-control" name = "cat_title" placeholder = "update a category">

                    <?php
                        }
                    }
                    
                    ?>


                    <?php
                          if(isset($_POST['update'])){
                            $cat_title = $_POST['cat_title'];
                            $query = "UPDATE category SET cat_title = '$cat_title' WHERE cat_id = $cat_id";
                            $update_result = mysqli_query($connection,$query);
                            if(!$update_result){
                             echo "query faild".mysqli_error($connection);

                            }
                            header("Location: catagory.php");
                            
                        }
                    
                    ?>



                    
                </div>
                <div class="form-group">
                    <input type = "submit" class = "btn btn-primary" name = "update" value = "Update" >
                </div>
            </form>