<?php

  session_start();
  include_once "../../config/connection.php";

  $userId = $_SESSION['user']->id;
  $currentTimestamp = time();

  $q = "UPDATE cart SET date_purchased = from_unixtime($currentTimestamp) WHERE user_id = :userID";

  $stmt = $conn->prepare($q);

  try {
    $stmt->execute(array(
      ':userID' => $userId
    ));

    $_SESSION['success'] = "Your order has been set.";
    header("Location: ../../index.php");

  } catch(PDOException $ex) {
    $_SESSION['errors'] = "Purchasing failed";
    header("Location: ../../index.php");
  }