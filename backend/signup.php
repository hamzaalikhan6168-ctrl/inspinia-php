<?php
include ('database.php');
if($_SERVER['REQUEST_METHOD'] =='POST'){
    $name=$_POST['name'];
    $username=$_POST['username'];
    $password=md5($_POST['password']);

    $check="SELECT * FROM `users` WHERE `username`= '$username'";
    $checkresult=mysqli_query($conn,$check);
    if($checkresult->num_rows > 0){
        header("Location: ../SignUp.php?err=username exist");
        exit();
    }else{
          $sql="INSERT INTO `users` (`name`, `username`, `password`, `created_at`) VALUES ('$name','$username', '$password', current_timestamp())";
          $result=mysqli_query($conn,$sql);
          header("Location: ../index.php?success=inserted!");      
    }
}

 