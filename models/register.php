<?php

    session_start();

    if(isset($_POST['btn-register'])) {
        $first_name = $_POST['first-name'];
        $last_name = $_POST['last-name'];
        $username = $_POST['username'];
        $pw = $_POST['password'];
        $email = $_POST['email'];

        $errors = [];

        $regexName = "/^[A-Z][a-z]{2,19}$/";
        $regexPassword = "/^.{5,50}$/";

        if(!preg_match($regexName, $first_name)) {
            $errors[] = "Wrong name format.";
        }

        if(!preg_match($regexName, $last_name)) {
            $errors[] = "Wrong name format.";
        }

        if(empty($username)) {
            $errors[] = "Choose a username.";
        }

        if(!preg_match($regexPassword, $pw)) {
            $errors[] = "Password must be 5 characters minumum.";
        }

        if(!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $errors[] = "Wrong email format.";
        }

        define("ROLE", 2);

        //

        if(count($errors) == 0) {
            require_once '../config/connection.php';

            $pw = md5($pw);
            $query = "INSERT INTO user VALUES(NULL, ?, ?, ?, ?, ?, ?)";
            $stmt = $conn->prepare($query);

            try {
                $stmt->execute([$first_name, $last_name, $username, $email, $pw, ROLE]);
                $_SESSION['success'] = 'Account successfully created!';
                header("Location: ../index.php");
            }
            catch(PDOException $ex) {
                $err = $ex->getMessage();
                $_SESSION['errors'] = [$err];
            }
        }
        else {
            $_SESSION['errors'] = $errors;
            header("Location: ../index.php");
        }
    }