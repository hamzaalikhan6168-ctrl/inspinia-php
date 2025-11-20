<?php 
class Product extends User{

    public function add_product(){
        
        $user = $this->get_active_user($_SESSION['id']);
        if(!$user){
            echo "user is not active";
        }
        //INSERT PRODUCT
    }
    
}