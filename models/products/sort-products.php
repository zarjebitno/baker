<?php

    header("Content-Type: application/json");
    include_once "functions.php";
    include_once "../../config/connection.php";

    try {
        $query = "SELECT * FROM product ";

        if(isset($_POST['id'])) {
            $id = $_POST['id'];
    
            $query .= "WHERE category_id = $id";
        }

        if(isset($_GET['searchValue'])) {
            $searchValue = $_GET['searchValue'];
            $query .= "WHERE name LIKE '%$searchValue%'";
        }
    
        if(isset($_POST['val'])) {
            $sort = $_POST['val'];
    
            switch($sort){
                case 1:
                    $query .= "ORDER BY price ASC";
                    break;
                case 2:
                    $query .= "ORDER BY price DESC";
                    break;
                case 3:
                    $query .= "ORDER BY name ASC";
                    break;
                case 4:
                    $query .= "ORDER BY name DESC";
                    break; 
            }
        }  
    } catch(PDOException $ex) {
        echo json_encode($ex);
    }
    
    
    // else {
        //     http_response_code(400);
        //     echo json_encode(["error"=> "No sort parameter sent!"]); 
    // }

    $query .= " LIMIT 6";
    
    $posts = executeQuery($query);
    $num_of_pages = ceil(count($posts) / 6);
    echo json_encode([
        "items" => $posts,
        "num_of_pages" => $num_of_pages
    ]);