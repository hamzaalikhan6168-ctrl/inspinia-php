<?php
class Database_obj
{
    private $server = "localhost";
    private $username = "root";
    private $password = "";
    private $database = "inventory";

    public function connect_database()
    {
        $conn = mysqli_connect($this->server, $this->username, $this->password, $this->database);
        if (!$conn) {
            die("connection in database" . mysqli_connect_error());
        }
        return $conn;
    }
}


