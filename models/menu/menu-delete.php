<?php
session_start();
header('Content-Type: application/json');

if(isset($_GET['id'])){
    $id = $_GET['id'];

    include_once "../../config/connection.php";

    $delete = "DELETE FROM menu WHERE id = :id";
    $q = $conn->prepare($delete);
    try {
        $q->execute(array(
            ':id' => $id
        ));
        echo json_encode($q);
    }    
    catch(PDOException $ex){
        echo json_encode(['error'=> 'Problem with database: ' . $ex->getMessage()]);
        http_response_code(500); }
    } else {
        http_response_code(400);
        echo json_encode(["error"=> "No idMenu parameter sent!"]);
    }