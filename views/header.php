<div class="header">
      <div class="bg-color">
        <div class="wrapper">
          <div class="container">
            <div class="row">
              <div class="banner-info text-center wow fadeIn delay-05s">
                <?php
                  if(isset($_SESSION['errors'])) {
                    $err = $_SESSION['errors'];
                    echo ("<p class='alert alert-danger'>". $err ."</p>");
                    unset($_SESSION['errors']);
                  }
                  if(isset($_SESSION['success'])) {
                    $err = $_SESSION['success'];
                    echo ("<p class='alert alert-success'>". $err ."</p>");
                    unset($_SESSION['success']);
                  }
                ?>
                <h1 class="bnr-title">We are at ba<span>ker</span></h1>
                <h2 class="bnr-sub-title">Starting a new journey!!</h2>
                <p class="bnr-para">Some hats can only be worn if you're willing to be jaunty, to set them at an angle and to walk beneath them with a spring in your stride as if you're only a step away from dancing. </p>
                <div class="brn-btn">
                  <a href="?page=shop" class="btn btn-more">Define your style</a>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>