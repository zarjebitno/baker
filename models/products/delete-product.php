<?php
session_start();
header('Content-Type: application/json');

if(isset($_GET['idProduct'])){
    $id = $_GET['idProduct'];

    include_once "../../config/connection.php";

    $delete = "DELETE FROM product WHERE id = :idProduct";
    $q = $conn->prepare($delete);
    try {
        $q->execute(array(
            ':idProduct' => $id
        ));
        echo json_encode($q);
    }    
    catch(PDOException $ex){
        echo json_encode(['error'=> 'Problem with database: ' . $ex->getMessage()]);
        http_response_code(500); }
    } else {
        http_response_code(400);
        echo json_encode(["error"=> "No idProduct parameter sent!"]);
    }