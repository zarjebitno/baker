<?php
    require_once "models/products/get-one.php";
?>



<div class="container product-container">
    <div class="row">
        <form class="col-md-6 col-sm-10" method="post" enctype="multipart/form-data" action="models/products/product-edit.php">
        <div class="col-md-6 col-sm-12">
            <img id="tester" class="img-fluid" src="assets/img/items/<?=$product->img?>" alt="<?=$product->img?>"/>
            <input type="file" name="kusur" id="file-edit" onchange="document.querySelector('#tester').src = window.URL.createObjectURL(this.files[0])"/>
        </div>
        <div>
            <h2>Name</h2>
            <input type="text" name="product-name" class="form-control" value="<?=$product->name?>"/>
            <h2>Description</h2>
            <textarea class="form-control" name="product-desc" rows="9"><?=$product->description?></textarea>
            <h2>Price</h2>
            <input type="number" name="product-price" class="form-control" value="<?=$product->price?>"/>
            <h2>Category</h2>
            <select name="product-cat" class="form-control">
                <option value="1">Men</option>
                <option value="2">Women</option>
            </select>
            <button type="submit" class="form-control" style="margin-top: 15px;" name="product-update" value="<?=$product->id?>">Update</button>
        </div>
        </form>
    </div>
</div>