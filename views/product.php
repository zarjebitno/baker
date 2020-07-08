<?php
    require_once "models/products/get-one.php";
?>



<div class="container product-container">
    <div class="row">
        <div class="col-md-6 col-sm-12">
            <img class="img-fluid" src="assets/img/items/<?=$product->img?>" alt="<?=$product->img?>"/>
        </div>
        <div class="col-md-6 col-sm-12">
            <h2><?=$product->name?></h2>
            <p><?=$product->description?></p>
            <p class="price"><?=$product->price?> &euro;</p>
            <button class="btn cart-btn" value="<?=$product->id?>">Add to Cart</button>
        </div>
    </div>
</div>