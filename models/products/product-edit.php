<?php

session_start();
    require_once "../../config/connection.php";

    if(isset($_POST['product-update'])) {
        $id = $_POST['product-update'];
        $name = $_POST['product-name'];
        $desc = $_POST['product-desc'];
        $price = $_POST['product-price'];
        $category = $_POST['product-cat'];
        $image = $_FILES['kusur'];

        $err = false;

        $fileExplode = explode(".", $image['name']);
        $ext = end($fileExplode);

        $allowedType = array("jpeg", "jpg", "png");
        if(!in_array($ext, $allowedType)) {
            $_SESSION['errors'] = "Wrong file extension.";
            $err = true;
        }
        else {
            if($image['size'] > 1048576) {
                $_SESSION['errors'] = "Select images up to 1 MB.";
                $err = true;
            }
        }

        if(!$err) {
            $tmpURL = $image['tmp_name'];
            $fileName = $image['name'];
            $loc = ROOT."/assets/img/items/".$fileName;

            if(move_uploaded_file($tmpURL, $loc)) {
                $query = "UPDATE product SET img = :fileName, name = :name, description = :desc, price = :price, category_id = :cat_id WHERE id = :id";

                $stmt = $conn->prepare($query);

                try {
                    $stmt->execute(array(
                        ':name'=>$name,
                        ':desc'=>$desc,
                        ':price'=>$price,
                        ':cat_id'=>$category,
                        ':id'=>$id,
                        ':fileName'=>$fileName
                    ));
                    header("Location: ../../index.php?page=admin");
                }
                catch(PDOException $ex) {
                    $_SESSION['errors'] = "Product update failed.";
                    header("Location: ../../index.php?page=admin");
                }
            }   
        }
    }
    else {
        $_SESSION['errors'] = "Something is wrong. Try again later.";
        header("Location: ../../index.php?page=admin");
    }