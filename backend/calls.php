<?php
// include 'Actions.php';z
include 'User.php';

// if(isset($_GET['action']) && $_GET['action'] === 'add-product'){
//     $action = new Actions();
//     $action->add_product();
// }

// if(isset($_GET['action']) && $_GET['action'] === 'get-products'){
//     $action = new Actions();
//     $action->get_products();
// }

if(isset($_POST['action']) && $_POST['action']  === 'add-user'){
    $user = new User();
    print_r($user->add_user());
}

if(isset($_POST['action']) && $_POST['action']  === 'edit-user'){
    $user = new User();
    print_r($user->edit_user());
}

if(isset($_GET['action']) && $_GET['action']  === 'delete-user'){
    $user = new User();
    print_r($user->delete_user());
}
?>