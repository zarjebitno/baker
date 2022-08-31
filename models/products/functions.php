<?php

define("POST_PER_PAGE", 6);

function getProducts($limit = 0) {
    global $conn;
    $limit = ((int) $limit) * POST_PER_PAGE;
    return executeQuery("SELECT * FROM product LIMIT $limit, 6");
}

function getAll() {
    global $conn;
    return executeQuery("SELECT * from product");
}

function getHotProducts() {
    global $conn;
    return executeQuery("SELECT * FROM product ORDER BY price DESC LIMIT 3");
}

function getOneProduct($id) {
    global $conn;
    return executeSingleQuery("SELECT * from product WHERE id = $id");
}

function get_num_of_items(){
    return executeSingleQuery("SELECT COUNT(*) AS num_of_items FROM product");
}

function get_pagination_count(){
    $result = get_num_of_items(); 
    $num_of_items = $result->num_of_items;
    return ceil($num_of_items / POST_PER_PAGE); 
}
