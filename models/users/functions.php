<?php

function getUsers() {
    global $conn;
    return executeQuery("SELECT * from user");
}

function getOneUser($id) {
    global $conn;
    return executeSingleQuery("SELECT * from user WHERE id = $id");
}