<?php 
include('database.php');
if($_SERVER['REQUEST_METHOD'] == 'GET'){
    $sql = "SELECT * FROM `employee`";
    $result = mysqli_query($conn,$sql);
    $data = mysqli_fetch_all($result,MYSQLI_ASSOC);
    //  echo "<pre>";
    // print_r($data);
    // echo "</pre>";
    echo json_encode(['success' => true, 'data' => $data]);
}   