<?php

include('database.php');
       

if($_SERVER["REQUEST_METHOD"] == "POST"){
        $id=$_POST['id'];
        $productname=$_POST['productname'];
        $color=$_POST['color'];
        $size=$_POST['size'];
        $quantity=$_POST['quantity'];
        $category=$_POST['category'];

        // $query= "SELECT * FROM product WHERE id = '$id'";a
        // $result=mysqli_query($conn,$query);
        // $old = mysqli_fetch_assoc($result);

         $sql = "UPDATE `product` SET `productname` = '$productname', `color` = '$color', `quantity` = '$quantity' ";
         if(isset($_POST['size']) && !empty($_POST['size'])){
        $sql .= ", size = '" . $_POST['size'] . "'";
         }
         if(isset($_POST['category']) && !empty($_POST['category'])){
            $sql .= ", category = '" . $_POST['category'] . "'";
         }
         $sql .= " WHERE id = " . $id;
        if (mysqli_query($conn, $sql)) {
        echo json_encode(['success' => true, 'message' => 'Update Successfully']);
        // header("Location: ../list-product.php?msg=updated");
        // exit;
    } else {
        echo json_encode(['error' => true, 'message' => 'Did Not Update Successfully']);
        // header("Location: ../list-product.php?err=update_failed");
        exit;
    }
}

?>