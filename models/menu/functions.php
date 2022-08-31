<?php

function getMenus() {
    return executeQuery("SELECT * FROM menu");
}

function getOneMenu($id) {
    global $conn;
    return executeSingleQuery("SELECT * from menu WHERE id = $id");
}