<?php

    header("Content-Type: application/json");
    include "functions.php";
    include "../../config/connection.php";

    if(isset($_POST['val'])) {
        $sort = $_POST['val'];

        $query = "SELECT * FROM product ";


        switch($sort){
            case 1:
                $query .= "ORDER BY price DESC";
                break;
            case 2:
                $query .= "ORDER BY price ASC";
                break;
            case 3:
                $query .= "ORDER BY name ASC";
                break;
            case 4:
                $query .= "ORDER BY name DESC";
                break; 
        }

        $posts = executeQuery($query);
        echo json_encode($posts);
    }
    else {
        http_response_code(400);
        echo json_encode(["error"=> "No sort parameter sent!"]); 
    }