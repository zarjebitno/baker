<?php

session_start();

    include_once "../../config/connection.php";

    if(isset($_POST['menu-add'])) {
        $name = $_POST['menuName'];
        $href = $_POST['href'];

        if(!empty($name) || !empty($href)) {
            $query = "INSERT INTO menu VALUES(NULL, :name, :href)";

            $stmt = $conn->prepare($query);

            try {
                $stmt->execute(array(
                    ':name'=>$name,
                    ':href'=>$href
                ));
                $_SESSION['success'] = "New menu item added";
                header("Location: ../../index.php?page=admin");
            }
            catch(PDOException $ex) {
                $_SESSION['errors'] = "Adding menu item failed.";
                header("Location: ../../index.php?page=admin");
            }
        }
    }
    else {
        $_SESSION['errors'] = "Parameter not set";
        header("Location: ../../index.php?page=admin");
    }