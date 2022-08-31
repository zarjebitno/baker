<?php
  session_start();
  include_once 'config/connection.php';
  include 'views/fixed/head.php';
  include 'views/fixed/nav.php';

  if(!isset($_GET['page'])) {
    include "views/header.php";
    include "views/features.php";
    include "views/join-us.php";
    include "views/hottest-sellers.php";
    include "views/contact.php";
  }
  else {
    switch($_GET["page"]) {
      case 'shop': 
        include "views/shop-header.php";
        include "views/shop-main.php";
        break;
      case 'product':
        include "views/shop-header.php";
        include 'views/product.php';
        break;
      case 'admin':
        if(isset($_SESSION['user']))
          if($_SESSION['user']->role == 1 || $_SESSION['user']->role == 'admin') {
            include "views/admin/statistics.php";
            include "views/admin/users.php";
            include "views/admin/products.php";
            break;
          }
        case 'user-add': include "views/partial/user-add.php"; break;
        case 'product-add': include "views/partial/product-add.php"; break;
        case 'product-edit': include "views/partial/product-edit.php"; break;
        case 'user-edit': include "views/partial/user-edit.php"; break;
        case 'menu-add': include "views/partial/menu-add.php"; break;
        case 'menu-edit': include "views/partial/menu-edit.php"; break;
      case 'cart': 
        include 'views/shop-header.php';
        include 'views/cart.php';
        break;
      case 'about':
        include 'views/header.php';
        include 'views/about.php';
        break;
      default: 
        include "views/header.php";
        include "views/features.php";
        include "views/join-us.php";
        include "views/hottest-sellers.php";
        include "views/contact.php";
    }
  }
    
  include 'views/fixed/footer.php';