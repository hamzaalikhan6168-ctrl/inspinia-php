<?php
session_start();
class Db
{

    private $conn;

    function __construct()
    {
        $server = "localhost";
        $username = "root";
        $password = "";
        $database = "inventory";
        $this->conn = mysqli_connect($server, $username, $password, $database);
    }

    public function add_product($data)
    {
        $sql = "INSERT INTO `product` ( 
        `productname`, 
        `color`, 
        `size`, 
        `quantity`, 
        `category`) VALUES (
        '" . $data['productname'] . "', 
        '" . $data['color'] . "', 
        '" . $data['size'] . "', 
        '" . $data['quantity'] . "', 
        '" . $data['category'] . "')";

        if (mysqli_query($this->conn, $sql)) {
            return true;
        } else {
            return false;
        }
    }

    public function get_products()
    {
        $sql = "SELECT * FROM product";
        $result = mysqli_query($this->conn, $sql);
        return $result->fetch_all();
    }
    public function get_users()
    {
        $sql = "SELECT * FROM users";
        $result = mysqli_query($this->conn, $sql);
        return $result->fetch_all();
    }
    public function get_employee()
    {
        $sql = "SELECT * FROM employee";
        $result = mysqli_query($this->conn, $sql);
        return $result->fetch_all();    
    }


    public function check_user_status()
    {
        // $sql = "SELECT status FROM users WHERE id = " . $_SESSION['id'] . " AND status = 1";
        $sql = "SELECT status FROM users WHERE id = 39 AND status = 1";

        $result = mysqli_query($this->conn, $sql);
        if ($result->num_rows > 0) {
            return true;
        } else {
            return false;
        }
    }
}
