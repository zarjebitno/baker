<?php

header("Content-Type: application/json");

if(isset($_GET['limit'])){
    include "functions.php";
    include "../../config/connection.php";
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