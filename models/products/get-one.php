<?php

require_once "functions.php";

if(isset($_GET['id'])) {
    $id = $_GET['id'];

    $product = getOneProduct($id);
} else {
    echo json_encode(["message"=> "ID not passed."]);
    http_response_code(400); 
}