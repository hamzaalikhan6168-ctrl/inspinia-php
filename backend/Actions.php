<?php
include 'Db.php';
class Actions
{
    private $db;

    function __construct()
    {
        $this->db = new Db();
        if(!$this->db->check_user_status()) exit;
    }
    public function add_product()
    {
        $data['productname'] = $_POST['productname'];   
        $data['color']  = $_POST['color'];
        $data['size']  = $_POST['size'];
        $data['quantity']  = $_POST['quantity'];
        $data['category']  = $_POST['category'];

        $result = $this->db->add_product($data);

        if ($result) {
            echo "Added Successfully";
        } else {
            echo "Error arha hai sql";
        }
    }

    public function get_products() {
        print_r($this->db->get_products());
    }

    public function edit_product() {
        
    }

    public function delete_product() {}
}
