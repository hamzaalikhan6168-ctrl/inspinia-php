<?php 
include('databse.php');
if ($_SERVER['REQUEST_METHOD'] == 'GET') {
     $name = $_POST['name'];
    $username = $_POST['username'];
    $email = $_POST['email'];
    $password = md5($_POST['password']);
    $salary = $_POST['salary'];
    $gender = $_POST['gender'];
    $designation = $_POST['designation'];
    
    if (isset($_POST['hobbies'])) {
        $hobbies = implode(",", $_POST['hobbies']);
    }
    if (isset($_FILES['profile_pic'])) {
        $folder = "../uploads/";
        if (!is_dir($folder)) {
            mkdir($folder, 0777, true);
        }
        $newname = time() . "-" . basename($_FILES['profile_pic']['name']);
        $profile_pic = $folder . $newname;

        if (move_uploaded_file($_FILES['profile_pic']['tmp_name'], $profile_pic)) {
        }
    }

    
    if (mysqli_query($conn, $sql)) {
        echo json_encode(['success' => true, 'message' => 'Update Successfully']);
    } else {
      echo json_encode(['error' => true, 'message' => 'did not Update Successfully']);
      
    }
}


?>