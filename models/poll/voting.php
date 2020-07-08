<?php

session_start();
include_once "../../config/connection.php";

if(isset($_POST['vote-btn']) || isset($_POST['poll-vote'])){
    $answer = $_POST['poll-vote'];
    $user = $_SESSION['user']->id;

    $query = "SELECT * FROM poll WHERE ACTIVE = 1";
    $a = executeSingleQuery($query)->id;


    $query = "SELECT * FROM poll p INNER JOIN poll_answers pa ON p.id = pa.poll_id WHERE p.active = 1 AND pa.user_id = $user";
    $rez = $conn->query($query);

    if($rez->rowCount() == 0) {
        $query = "INSERT INTO poll_answers VALUES(NULL, :user_id, :poll_id, :choice_id)";
        $stmt = $conn->prepare($query);

        try {
            $stmt->execute(array(
                ':user_id'=>$user,
                ':poll_id'=>$a,
                ':choice_id'=>$answer
            ));
            $_SESSION['success'] = "You voted!";
            header("Location: ../../index.php?page=about");
            http_response_code(201);
        }
        catch(PDOException $ex) {
            var_dump($ex);
            header("Location: ../../index.php?page=about");
            $_SESSION['errors'] = "something is wrong.";
            http_response_code(500);
        }
        
    }
    else {
        $_SESSION['errors'] = "You already voted for this poll";
        header("Location: ../../index.php?page=about");
    }

}
else {
    $_SESSION['errors'] = "You must pick an option";
    header("Location: ../../index.php?page=about");
}