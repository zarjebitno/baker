<?php

    header('Content-Type: application/json');
    require_once "functions.php";
    include_once "../../config/connection.php";

    if(isset($_POST['item_id'])) {
        $id = $_POST['item_id'];

        $sessionItem = getOneProduct($id);
        $_SESSION['cart'] = $sessionItem;
    }
