

<div class="container" style="padding-top:120px;">
    <div class="row d-flex justify-content-center">
        <form action="models/products/product-add.php" enctype="multipart/form-data" method="POST" class="p-add-form">
        <div class="col-lg-4">
            <div class="picture-box">
            <img class="img-fluid" alt="Preview" style="width:300px; height:300px;" id="preview"/>
            <input type="file" name="proba" onchange="document.querySelector('#preview').src = window.URL.createObjectURL(this.files[0])"/>
            </div>
        </div>
        <div>
            <h2>Name</h2>
            <input type="text" name="product-name" class="form-control"/>
            <h2>Description</h2>
            <textarea class="form-control" name="product-desc" rows="9"></textarea>
            <h2>Price</h2>
            <input type="number" name="product-price" class="form-control"/>
            <h2>Category</h2>
            <select name="product-cat" class="form-control">
                <option value="1">Men</option>
                <option value="2">Women</option>
            </select>
            <button type="submit" class="form-control" name="add-product">Add</button>
        </div>
        </form>
    </div>
</div>