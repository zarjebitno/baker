<?php

include_once "../../config/connection.php";

session_start();
    if(isset($_POST['update-user'])) {
        $id = $_POST['update-user'];
        $fName = $_POST['first-name'];
        $lName = $_POST['last-name'];
        $user = $_POST['username'];
        $pw = $_POST['pw'];
        $email = $_POST['email'];

        $query = "UPDATE user SET first_name = :fName, last_name = :lName, username = :username, email = :email, password = :pw WHERE id = :id";

        $stmt = $conn->prepare($query);

        $pw = md5($pw);

        try {
            $stmt->execute(array(
                ':fName'=>$fName,
                ':lName'=>$lName,
                ':username'=>$user,
                ':pw'=>$pw,
                ':email'=>$email,
                ':id'=>$id
            ));
            header("Location: ../../index.php?page=admin");
            $_SESSION['success'] = "User update successfully";
        }
        catch(PDOException $ex) {
            $_SESSION['errors'] = "User update failed";
            header("Location: ../../index.php?page=admin");
        }
    } else {
        $_SESSION['errors'] = "User not set";
        header("Location: ../../index.php?page=admin");
    }