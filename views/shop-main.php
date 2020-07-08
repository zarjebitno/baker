<section id="shop-main">
    <div class="container">
        <div class="row">
            <div class="col-lg-2 col-sm-12 filters">
                <h2>Filters</h2>
                <span><input type="radio" name="filter" id="filter-men" class="filter" value="1"style="margin-right:12px;"><label for="filter-men">Men</label></span>
                <span><input type="radio" name="filter" id="filter-women" class="filter" value="2"style="margin-right:12px;"><label for="filter-men">Women</label></span>
                <h2>Sort By</h2>
                <span><input type="radio" name="sort" style="margin-right:12px;" class="sort" value="1"/>Price Ascending</span>
                <span><input type="radio" name="sort"style="margin-right:12px;" class="sort" value="2"/>Price Descending</span>
                <span><input type="radio" name="sort" style="margin-right:12px;" class="sort" value="3"/>A-Z</span>
                <span><input type="radio" name="sort" style="margin-right:12px;" class="sort" value="4"/>Z-A</span>
            </div>
            <div class="col-lg-10">
                <div class="search-bar">
                    <input type="text" name="productName" id="search" placeholder="Search..."/>
                </div>

                <div class="product-frame">

                    <?php
                        require_once "models/products/functions.php";
                        $products = getProducts();
                        foreach($products as $p):
                    ?>

                    <div class="col-lg-4 col-sm-12">
                        <div class="blog-img">
                            <a href="index.php?page=product&id=<?=$p->id?>">
                                <img src="assets/img/items/<?=$p->img?>" class="img-responsive">
                            </a>
                            <h2><?=$p->name?></h2>
                            <h2 class="price"><?=$p->price?> &euro;</h2>
                        </div>
                    </div>

                        <?php endforeach; ?>
                </div>
                <ul id="blog_pag" class="nav nav-pills"> 

                    <?php
                        $num_of_posts = get_pagination_count();
                        for($i = 0; $i < $num_of_posts; $i++): 
                    ?>

                    <li><a href="#" class="post-pag" data-limit="<?= $i ?>"><?= $i+1 ?></a></li>

                    <?php endfor; ?>
                </ul>
            </div>
        </div>
    </div>
</section>