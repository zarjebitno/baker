<?php

session_start();

if(isset($_POST['btn-contact'])) {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $subject = $_POST['subject'];
    $msg = $_POST['message'];

    $errors = [];

    $regexName = "/^[A-Z][a-z]{2,19}$/";

    if(!preg_match($regexName, $name)) {
        $errors[] = "Wrong name format.";
    }
    if(!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $errors[] = "Wrong email format.";
    }
    if(strlen($msg) > 300) {
        $errors[] = "Message too long.";
    }

    if(count($errors) == 0) {
        require_once '../config/connection.php';
        //upisivanje u bazu/phpmailer
        $_SESSION['success'] = "Feedback sent";
        header("Location: ../index.php");
    }
    else {
        $_SESSION['errors'] = $errors;
        header("Location: ../index.php");
    }
}