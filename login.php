
<?php include 'include/db.php'?>
<?php session_start(); ?>
<?php
if(isset($_POST['login'])){
    $username = $_POST['username'];
    $password = $_POST['password'];

    $username = mysqli_real_escape_string($connection,$username);
    $password = mysqli_real_escape_string($connection,$password);
    $query = "SELECT * FROM user WHERE username = '$username'";
    $result_query_username = mysqli_query($connection,$query);
    if(!$result_query_username){
        die("query faild".mysqli_error($result_query_username));
    }
    while($row = mysqli_fetch_assoc($result_query_username)){
        $db_user_id = $row['user_id'];
        $db_user_firstname = $row['user_firstname'];
        $db_user_lastname = $row['user_lastname'];
        $db_user_password = $row['user_password'];
        $db_username = $row['username'];
        $db_user_role = $row['user_role'];
       
    }
    if($username !== $db_username && $password !== $db_user_password){
        header("Location: ./index.php");
        
    }
    else if($username == $db_username && $password == $db_user_password){

        $_SESSION['username'] = $db_username;
        $_SESSION['password'] = $db_user_password;
        $_SESSION['role'] = $db_user_role;
        $_SESSION['firstname'] = $db_user_firstname;
        $_SESSION['lastname'] = $db_user_lastname;

        header("Location: ./admin");
    }
    else {
        header("Location: ./index.php");
    }
}

?>

