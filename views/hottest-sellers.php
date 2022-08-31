<section id="blog" class="section-padding wow fadeInUp delay-05s">
      <div class="container">
        <div class="row">
          <div class="col-md-12 text-center">
            <h2 class="service-title pad-bt15">Hottest sellers</h2>
            <p class="sub-title pad-bt15">This selection is selling like cheesecakes. Order up!</p>
            <hr class="bottom-line">
          </div>

          <?php
            require_once "models/products/functions.php";
            $hot = getHotProducts();
            foreach($hot as $h):
          ?>
          <div class="col-md-4 col-sm-6 col-xs-12">
            <div class="blog-sec">
              <div class="blog-img">
                <a href="index.php?page=product&id=<?=$h->id?>">
                  <img src="assets/img/items/<?=$h->img?>" class="img-responsive">
                </a>
              </div>
              <div class="blog-info">
                <h2><?=$h->name?></h2>
                <div class="blog-comment">
                  <p>
                    <span> <?=$h->price?> &euro;</span>
                  </p>
                </div>
                <p><?=$h->description?></p>
              </div>
            </div>
          </div>
          <?php endforeach ?>
          <div class="col-md-12 text-center">
            <a href="index.php?page=shop" class="btn btn-more">SEE ALL OUR PRODUCTS</a>
          </div>
        </div>
      </div>
    </section>