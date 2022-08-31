<?php

  function getCartItems($userID) {
    global $conn;

    $q = "SELECT * FROM cart c INNER JOIN product p ON c.product_id = p.id WHERE c.user_id = $userID AND c.date_purchased IS NULL";

    $cartItems = $conn->query($q)->fetchAll();
    return $cartItems;
  }

  function getOrderLastDay() {
    global $conn;

    $q = "SELECT * FROM cart WHERE date_purchased >= NOW() - INTERVAL 1 DAY";
    $cartItems = $conn->query($q)->fetchAll();

    if(!$cartItems) return 0;

    foreach($cartItems as $item) {
      $groupedUpCartItems[$item->date_purchased][] = $item;
    }

    return count($groupedUpCartItems);
  }