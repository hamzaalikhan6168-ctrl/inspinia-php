<?php 
include('database.php');
if(isset($_GET['id'])){
    $id = $_GET['id'];
}
$sql = "SELECT * FROM `product` WHERE id = $id";
    $result = mysqli_query($conn, $sql);
    $data = mysqli_fetch_assoc($result);
    if ($data) {
        echo json_encode(['success' => true, 'data' => $data]);
    } else {
        echo json_encode(['error' => true, 'message' => 'did not update']);
    }
?>