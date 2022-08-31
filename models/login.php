<?php

    session_start();
    require_once '../config/connection.php';
    require_once '../models/users/functions.php';

    if(isset($_POST['btn-login'])) {
        $username = $_POST['username'];
        $pw = $_POST['password'];

        $query = "SELECT * FROM user u INNER JOIN role r ON u.role = r.id WHERE u.username = :username AND u.password = :pw";
        $stmt = $conn->prepare($query);
        $stmt->bindParam(":username", $username);
        $pw = md5($pw);
        $stmt->bindParam(":pw", $pw);
        $stmt->execute();

        if($stmt->rowCount() == 1) {
            $user = $stmt->fetch();
            $_SESSION['success'] = "Successfully logged in.";
            $_SESSION['user'] = $user;
            echo userLoggedIn($user->id);
            header("Location: ../index.php");
        }
        else {
            $_SESSION['errors'] = "No user with such name found.";
            header("Location: ../index.php");
        }
    }
    else {
        header("Location: ../index.php");
    }