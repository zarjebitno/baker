<?php

    header("Content-Type: application/json");
    include_once "../../config/connection.php";
    include_once "functions.php";

    if(isset($_GET['value'])) {
        if(empty($_GET['value'])) {
            $all = getProducts($limit);
            echo json_encode($all);
        }

        $value = $_GET['value'];
        
        $query = "SELECT * FROM product WHERE name LIKE '%$value%'";
        $search = executeQuery($query);

        echo json_encode($search);
    }
    else {
        http_response_code(400);
        echo json_encode(["error"=> "No sort parameter sent!"]); 
    }