<?php 

require_once "models/products/functions.php";

?>

<div class="container">
    <div class="row">
        <h2>Manage products <a href="index.php?page=product-add"><i class="fas fa-plus-circle"></i></a></h2>
        <table id="product-table">
            <thead class="thead-dark">
                <tr>
                <th scope="col">img</th>
                <th scope="col">Product</th>
                <th scope="col">Price</th>
                <th scope="col">Description</th>
                <th scope="col">Category</th>
                <th scope="col">Actions</th>
                </tr>
            </thead>
            <?php
                $products = getAll();
                foreach($products as $p):
            ?>
            <tr>
                <td><img src="assets/img/items/<?=$p->img?>" alt="<?=$p->img?>" class="admin-pic-products"/></td>
                <td><?=$p->name?></td>
                <td><?=$p->price?> &euro;</td>
                <td><?= $p->description?></td>
                <td><?if($p->category_id == 1) echo "Men"; else echo"Women"?></td>
                <td><a href="index.php?page=product-edit&id=<?=$p->id?>"><i class="fas fa-edit"></i></a><i class="fas fa-minus-square product-delete" data-id=<?=$p->id?>></i></td>
            </tr>
            <?php endforeach ?>
        </table>
    </div>
</div>
