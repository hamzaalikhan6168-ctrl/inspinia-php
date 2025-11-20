 <?php
include('database.php');
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $id = $_POST['id'];
    $name = $_POST['name'];
    $email = $_POST['email'];
    $salary = $_POST['salary'];
    $password = $_POST['password'];

    $query = "SELECT * FROM employee WHERE id = '$id'";
    $result = mysqli_query($conn, $query);
    $old = mysqli_fetch_assoc($result);

    $sql = "UPDATE `employee` SET `name` = '$name', `email` = '$email'";
    if(isset($_POST["password"]) && !empty($_POST["password"])){
        $sql .= ", password = '"  . md5($_POST["password"]) . "'";
    }

    if (!empty($_FILES['profile_pic'])) {
        $folder = "../uploads/";
        if (!is_dir($folder)) {
            mkdir($folder, 0777, true);
        }
        $newname = time() . "-" . basename($_FILES['profile_pic']['name']);
        $profile_pic = $folder . $newname;

        if (move_uploaded_file($_FILES['profile_pic']['tmp_name'], $profile_pic)) {
            $sql .= ", profile_pic = '" . $profile_pic . "' ";
        }
    }
    $sql .= " WHERE id = " . $id;
    if (mysqli_query($conn, $sql)) {
        header("Location: ../list-user.php?msg=updated");
        exit;
    } else {
        header("Location: ../list-user.php?err=update_failed");
        exit;
    }

l









    // if (
    //     $name == $old['name'] &&
    //     $email == $old['email'] &&
    //     $salary == $old['salary'] &&
    //     $update_password == $old['password'] &&
    //     $profile_pic == $old['profile_pic']
    // ) {
    //     header("Location: ../list_user.php?err=nochange");
    //     exit;
    // }

    
// } 
