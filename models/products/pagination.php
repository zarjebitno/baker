<?php

header("Content-Type: application/json");

if(isset($_GET['limit'])){
    include_once "functions.php";
    include_once "../../config/connection.php";
    $limit = $_GET['limit'];
    $products = getProducts($limit); 
    $num_of_pages = get_pagination_count();
    echo json_encode([
        "items" => $products,
        "num_of_pages" => $num_of_pages
    ]); 
} else {
    echo json_encode(["message"=> "Limit not passed."]);
    http_response_code(400); 
}