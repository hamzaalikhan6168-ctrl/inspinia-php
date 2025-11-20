<?php
include('database.php');
if (isset($_GET['id'])) {
    $id = $_GET['id'];

    $sql = "DELETE FROM `product` WHERE id = $id";
    $result = mysqli_query($conn, $sql);
    if ($result) {
        echo json_encode(['success' => true, 'message' => 'Deleted Successfully']);
    }else{
    echo json_encode(['error' => true, 'message' => 'did not delete']);
}
}