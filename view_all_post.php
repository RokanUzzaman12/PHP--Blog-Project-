

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
if(isset($_GET['source'])){
    $soruce = $_GET['source'];
}
else{
    $soruce ="";
}
 switch($soruce){
     case 'edit_post';
     include "edit.php";
     break;


     default:
     include "post.php";
     break;
 }

?>
     


       
        






       
    </div>
</div>
<!-- /.row -->

</div>

   <?php include "include/futter.php";?>