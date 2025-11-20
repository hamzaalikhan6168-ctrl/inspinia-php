<?php
include 'Database_obj.php';
class User
{
    private $conn;
    private $id;
    public function __construct()
    {
        $obj = new Database_obj();
        $this->conn = $obj->connect_database();
    }

    public function add_user()
    {
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
        $checkresult = mysqli_query($this->conn, $check);
        if ($checkresult->num_rows > 0) {
            header("Location: ../add-user.php?err=already exist");
            exit;
        } else {
            $sql = "INSERT INTO `employee` (name, username, email, password, salary, gender, hobbies, designation, profile_pic, created_at) 
                VALUES ('$name', '$username', '$email', '$password', '$salary', '$gender', '$hobbies', '$designation', '$profile_pic', current_timestamp())";
            $result = mysqli_query($this->conn, $sql);
            header("Location: ../list-user.php");
        }

        // print_r($_POST);
    }

    public function edit_user()
    {
        $this->id = $_POST['id'];
        $name = $_POST['name'];
        $email = $_POST['email'];
        $salary = $_POST['salary'];
        $password = $_POST['password'];

        $query = "SELECT * FROM employee WHERE id = '$this->id'";
        $result = mysqli_query($this->conn, $query);
        $old = mysqli_fetch_assoc($result);

        $sql = "UPDATE `employee` SET `name` = '$name', `email` = '$email'";
        if (isset($_POST["password"]) && !empty($_POST["password"])) {
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
        $sql .= " WHERE id = " . $this->id;
        if (mysqli_query($this->conn, $sql)) {
            header("Location: ../list-user.php?msg=updated");
            exit;
        } else {
            header("Location: ../list-user.php?err=update_failed");
            exit;
        }
    }
    public function delete_user()
    {
        if (isset($_GET['id'])) {
            $this->id = $_GET['id'];
            $sql = "DELETE FROM `employee` WHERE id = $this->id";
            if (mysqli_query($this->conn, $sql)) {
                header("Location: ../list-user.php?err=deleted");
                exit;
            } else {
                echo "error deleleting record" . mysqli_error($this->conn);
            }
        } else {
            echo "Invalid Request!";
        }
    }

    public function get_active_user($id)
    {
        $sql = "SELECT * FROM users where id = $this->id AND status = 1 AND isbanned = 1 ";
        $result = mysqli_query($this->conn, $sql);
        $record = mysqli_fetch_assoc($result);
        return $record ? $record : false;
    }
}

