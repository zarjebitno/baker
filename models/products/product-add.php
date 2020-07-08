<?php  
session_start();
    require_once "../../config/connection.php";

    if(isset($_POST['add-product'])) {
        $image = $_FILES["proba"];
        $name = $_POST['product-name'];
        $desc = $_POST['product-desc'];
        $price = $_POST['product-price'];
        $category = $_POST['product-cat'];

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
            $loc = $_SERVER['DOCUMENT_ROOT']."/ict/Baker/assets/img/items/".$fileName;

            if(move_uploaded_file($tmpURL, $loc)) {
                $query = "INSERT INTO product VALUES(NULL, :fileName, :name, :desc, :price, :cat_id)";
    
                $stmt = $conn->prepare($query);
    
                try {
                    $stmt->execute(array(
                        ':fileName'=>$fileName,
                        ':name'=>$name,
                        ':desc'=>$desc,
                        ':price'=>$price,
                        ':cat_id'=>$category
                    ));

                    echo "<script type='text/javascript'> document.location = '../../index.php?page=admin'; </script>";
                    $_SESSION['success'] = "Product added successfully";
                    http_response_code(201);
                }
                catch(PDOException $ex) {
                    header("Location: ../../index.php?page=admin");
                    var_dump($ex);
                    $_SESSION['errors'] = "Product update failed.";
                    http_response_code(400);
                }
            }
            else {
                $_SESSION['errors'] = "TESER";
                header("Location: ../../index.php?page=admin");
            }
        }        
    }
    else {
        $_SESSION['errors'] = "Something is wrong. Try again later.";
        header("Location: ../../index.php?page=admin");
    }