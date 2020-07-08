<?php  

    header("Content-Type: application/json");

    include_once "../../config/connection.php";
    include_once "functions.php";

    if(isset($_POST['id'])) {
        $id = $_POST['id'];

        $query = "SELECT * FROM product WHERE category_id = $id";
        $filter = executeQuery($query);
        echo json_encode($filter);
    }
    else {
        http_response_code(400);
        echo json_encode(["error"=> "No sort parameter sent!"]); 
    }