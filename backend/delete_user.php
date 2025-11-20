<?php
include ('database.php');
if(isset($_GET['id'])){
$id = $_GET['id'];

$sql="DELETE FROM `employee` WHERE id = $id";
if(mysqli_query($conn,$sql)){
echo json_encode(['success' => true, 'message' => 'deleted']);
}else{
    echo "error deleleting record" . mysqli_error($conn);
}
}else{
    echo"Invalid Request!";
}
?>