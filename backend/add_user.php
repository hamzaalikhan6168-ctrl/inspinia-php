<?php
include('database.php');
if ($_SERVER['REQUEST_METHOD'] == 'POST') {

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
    $check = "SELECT * FROM `employee` WHERE `username`= '$username' AND  `email` = '$email'";
    $checkresult = mysqli_query($conn, $check);
    if ($checkresult->num_rows > 0) {   
        echo json_encode(['error' => true, 'message' => 'you are already applied']);
    } else {
        $sql = "INSERT INTO employee (name, username, email, password, salary, gender, hobbies, designation, profile_pic, created_at) 
                VALUES ('$name', '$username', '$email', '$password', '$salary', '$gender', '$hobbies', '$designation', '$profile_pic', current_timestamp())";
        $result = mysqli_query($conn, $sql);

        echo json_encode(['success' => true, 'message' => 'your form is submitted']);
    }
}
