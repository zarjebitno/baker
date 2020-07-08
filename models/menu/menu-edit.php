<?php

session_start();

    include_once "../../config/connection.php";

    if(isset($_POST['menu-edit'])) {
        $id = $_POST['menu-edit'];
        $name = $_POST['menuName'];
        $href = $_POST['href'];

        $query = "UPDATE menu SET name = :name, src = :href WHERE id = :id";
        $stmt = $conn->prepare($query);

        try {
            $stmt->execute(array(
                ':name'=>$name,
                ':href'=>$href,
                ':id'=>$id
            ));
            $_SESSION['success'] = "Menu updated";
            header("Location: ../../index.php?page=admin");
        }
        catch (PDOException $ex) {
            $_SESSION['errors'] = "Update menu failed";
            header("Location: ../../index.php?page=admin");
        }
    }
    else {
        $_SESSION['errors'] = "Id not passed";
        header("Location: ../../index.php?page=admin");
    }