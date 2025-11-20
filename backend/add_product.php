<?php
include('database.php');
// include('Db.php');

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $productname = $_POST['productname'];
    $color = $_POST['color'];
    $size = $_POST['size'];
    $quantity = $_POST['quantity'];
    $category = $_POST['category'];
    if (isset($_FILES['product_pic'])) {
       
        $folder = "../uploads/";
        if (!is_dir($folder)) {
            mkdir($folder, 0777, true);
        }
        $newname =time() ."-" . basename($_FILES['product_pic']['name']);
        // $newname = "testing.png";
        $product_pic = $folder . $newname;

        if (move_uploaded_file($_FILES['product_pic']['tmp_name'], $product_pic)) {
        }
    }

    // $data=[
    //     ''
    // ];
    // $db =  new Db();
    // $db->add_product($data);

    $sql = "INSERT INTO `product` ( `productname`, `color`, `size`, `quantity`, `category` , `product_pic`) VALUES ('$productname', '$color', '$size', '$quantity', '$category' , '$product_pic')";
    $result = mysqli_query($conn, $sql);
    if ($result) {
        echo json_encode(['success' => true, 'message' => 'Product Add Successfully']);
    }    // header("Location: ../list-product.php");
    else {
        echo json_encode(['error' => true, 'message' => 'Unfortunately product did not add']);
    }
}
