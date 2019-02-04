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
           
        </div>
          
          <?php
          if(isset($_GET['source'])){
              $source = $_GET['source'];
          }
          else {
              $source = "";
          }
           switch($source){
                 
            case 'add_user';
            include 'add_user.php';
            break ;

            case 'user_edit';
            include 'user_edit.php';
            break ;

            default:
            include 'default_user.php';
            break;
           }
          ?>


    </div>
    <!-- /.row -->

</div>

       <?php include "include/futter.php";?>