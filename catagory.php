

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
        <div class="col-xs-6">
        <?php
                if(isset($_POST['submit'])){
                    
                    $cat_title = $_POST['cat_title'];
                    if($cat_title=="" || empty($cat_title)){
                        echo "You have to must be input something ";
                    }
                    else{
                        
                        $query = "INSERT INTO category(cat_title) ";
                        $query .="VALUE('$cat_title') ";
                        $query_category = mysqli_query($connection,$query);
                        echo "submited successfully ";
                    }
                 
                }

        ?>
            <form action = "catagory.php" method = "post">
                <div class="form-group">
                    <input type = "text" class = "form-control" name = "cat_title" placeholder = "Input a category">
                </div>
                <div class="form-group">
                    <input type = "submit" class = "btn btn-primary" name = "submit" value = "Submit" >
                </div>
            </form>



           <?php
            if(isset($_GET['edit'])){
            $cat_id = $_GET['edit'];
            include 'include/update.php';
            }
           
           ?>
           
        </div>

        <div class="col-xs-6">
    
            <table class = "table table-bordered table-hover">
                <thead>
                    <tr>
                        <td>id</td>
                        <td>category TItle</td>
                    </tr>
                </thead>
                <tbody>
                <?php

                    $query = "SELECT * FROM category";
                    $result_query = mysqli_query($connection,$query);
                    while($row = mysqli_fetch_assoc($result_query)){
                        $cat_id = $row['cat_id'];
                        $cat_title = $row['cat_title'];
                        echo "<tr>";
                        echo "<td>$cat_id</td>";
                        echo "<td>$cat_title</td>";
                        echo "<td><a href = 'catagory.php?delete={$cat_id}'>Delet</a></td>";
                        echo "<td><a href = 'catagory.php?edit={$cat_id}'>Edit</a></td>";
                        echo "</tr>";
                    }
                ?>
                <?php
                if(isset($_GET['delete'])){
                    $the_cat_id = $_GET['delete'];
                    $query = "DELETE FROM category WHERE cat_id=$the_cat_id";
                    $delete_result = mysqli_query($connection,$query);
                    header("Location: catagory.php");
                }
                ?>
                    
                        
                        
                    
                </tbody>
            </table>
        </div>
       
    </div>
</div>
<!-- /.row -->

</div>

   <?php include "include/futter.php";?>