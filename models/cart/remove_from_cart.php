<?php

  session_start();
  include_once "../../config/connection.php";

  $productId = $_POST['productID'];
  $userId = $_SESSION['user']->id;

  $q = "DELETE FROM cart WHERE product_id = :prod_id AND user_id = :user_id AND date_purchased IS NULL";

  $stmt = $conn->prepare($q);

  try {
    $stmt->execute(array(
      ':prod_id' => $productId,
      ':user_id' => $userId
    ));

    http_response_code(202);
  } catch(PDOException $ex) {
    $_SESSION['errors'] = 'Removing from cart failed';
    http_response_code(500);
  }
