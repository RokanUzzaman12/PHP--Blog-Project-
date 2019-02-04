<?php
 
?>


<div class="well">




                    <h4>Blog Search</h4>

                    <form action = "search.php" method = "post">
                    <div class="input-group">
                        <input name = "search" type="text" class="form-control">
                        <span class="input-group-btn">
                            <button class="btn btn-default" type="submit" name = "submit">
                                <span class="glyphicon glyphicon-search"></span>
                        </button>
                        </span>
                    </div>
                    </form>




                    <!-- /.input-group -->
                </div>
                 <!-- Login form -->
                 
               <div class="well">
               <h4>Log in </h4>

                    <form action = "login.php" method = "post">
                        <div class="form-group">
                            <input name = "username" type="text" class="form-control" placeholder = "Username">
                        </div>

                        <div class="form-group">
                        <input name = "password" type = "text" class = "form-control" placeholder = "Password">
                        </div>
                        <div class="form-group">
                        <input class = "btn btn-primary" type = "submit" name= "login" value=  "Log in">
                        </div>
                    </form>
               </div>





                <!-- Blog Categories Well -->
                <div class="well">
                    <h4>Blog Categories</h4>
                    <div class="row">
                        <div class="col-lg-12">
                            <ul class="list-unstyled">

                            <?php
                                $query = "SELECT * FROM category";
                                $select_query = mysqli_query($connection,$query);
                                while($row = mysqli_fetch_assoc($select_query)){
                                    $cat_id = $row['cat_id'];
                                    $cata_title = $row['cat_title'];
                                    echo "<li><a href='category.php?category=$cat_id'>{$cata_title}</a></li>";
                                }
                            
                            
                            
                            ?>
                                <!--<li><a href="#">Category Name</a></li>
                                
                                <li><a href="#">Category Name</a>
                                </li>
                                <li><a href="#">Category Name</a>
                                </li>
                                <li><a href="#">Category Name</a>
                                </li>-->
                            </ul>
                        </div>
                        <!-- /.col-lg-6 -->
                       
                        <!-- /.col-lg-6 -->
                    </div>
                    <!-- /.row -->
                </div>

                <!-- Side Widget Well -->
                <div class="well">
                    <h4>Side Widget Well</h4>
                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Inventore, perspiciatis adipisci accusamus laudantium odit aliquam repellat tempore quos aspernatur vero.</p>
                </div>

            </div>