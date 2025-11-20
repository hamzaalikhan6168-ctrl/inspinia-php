<?php
class Validations {
    public function email_validations(){

    }

    public function check_empty($input) {
        if ($input === null || $input === "") {
            return "empty";
        } else {
            return $input;
        }
    }
}

$obj = new Validations();

echo $obj->check_empty(5);   
echo "\n";
echo $obj->check_empty("");  
echo "\n";
echo $obj->check_empty(null); 
?>
