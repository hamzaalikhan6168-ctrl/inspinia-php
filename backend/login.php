<?php
// sleep(5);
include('Database_obj.php');
if($_SERVER['REQUEST_METHOD'] =='POST'){
    $username=$_POST['username'];
    $password=$_POST['password'];

    $obj = new Database_obj();
    $conn = $obj->connect_database();
    
    $sql="SELECT * FROM `users` WHERE `username`= '$username' AND `password`= '$password'";
    $result=mysqli_query($conn,$sql);
    
    if($result->num_rows > 0){
        $data=$result->fetch_assoc();
        session_start();
        $_SESSION['username']=$data['username'];
        $_SESSION['id']=$data['id'];
        echo json_encode(['success' => true, 'message' => 'User Logged in Successfully']);
    }else{
        echo json_encode(['error' => true, 'message' => 'Credentials Incorrect']);
    }
}
?>




 