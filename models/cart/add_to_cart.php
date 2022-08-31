<?php

  session_start();
  header('Content-Type: application/json');
  include_once "../../config/connection.php";

  $userId = $_SESSION['user']->id;
  $product_id = $_POST['item_id'];
  $currentTimestamp = time();
  // from_unixtime($currentTimestamp)

  $q = "INSERT INTO cart VALUES(NULL, :id, :product_id, NULL)";

  $stmt = $conn->prepare($q);

  try {
    $stmt->execute(array(
      ':id' => $userId,
      'product_id' => $product_id
    ));

    http_response_code(201);
  } catch(PDOException $ex) {
    $_SESSION['errors'] = "Adding product to cart failed.";
    http_response_code(500);
    header("Location: ../../index.php");
  }