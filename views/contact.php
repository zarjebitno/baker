<section id="contact" class="section-padding wow fadeInUp delay-05s">
      <div class="container">
        <div class="row">
          <div class="col-md-12 text-center white">
            <h2 class="service-title pad-bt15">Keep in touch with us</h2>
            <hr class="bottom-line white-bg">
          </div>
          <div class="col-md-6 col-sm-6 col-xs-12">
            <div class="loction-info white">
              <p><i class="fa fa-map-marker fa-fw pull-left fa-2x"></i>A99 Adam Street<br>Texas, TX 555072</p>
              <p><i class="fa fa-envelope-o fa-fw pull-left fa-2x"></i>info@baker.com</p>
              <p><i class="fa fa-phone fa-fw pull-left fa-2x"></i>+41 5787 2323</p>
            </div>
          </div>
          <div class="col-md-6 col-sm-6 col-xs-12">
            <div class="contact-form">
              <div id="sendmessage">Your message has been sent. Thank you!</div>
              <div id="errormessage"></div>
              <form action="models/contactValidation.php" method="post" role="form" class="contactForm" onsubmit="return validateContact();">
                <div class="col-md-6 padding-right-zero">
                  <div class="form-group">
                    <input type="text" name="name" class="form-control" id="name-contact" placeholder="Your Name" data-rule="minlen:4" data-msg="Please enter at least 4 chars" required/>
                    <div class="validation"></div>
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="form-group">
                    <input type="email" class="form-control" name="email" id="emailz-con" placeholder="Your Email" data-rule="email" data-msg="Please enter a valid email" required/>
                    <div class="validation"></div>
                  </div>
                </div>
                <div class="col-md-12">
                  <div class="form-group">
                    <input type="text" class="form-control" name="subject" id="subject" placeholder="Subject" data-rule="minlen:4" data-msg="Please enter at least 8 chars of subject" required/>
                    <div class="validation"></div>
                  </div>
                </div>
                <div class="col-md-12">
                  <div class="form-group">
                    <textarea class="form-control" id="msg" name="message" rows="5" data-rule="required" data-msg="Please write something for us" placeholder="Message" required></textarea>
                    <div class="validation"></div>
                  </div>
                  <button class="btn btn-primary btn-submit" name="btn-contact">SEND NOW</button>
                </div>
              </form>

            </div>
          </div>
        </div>
      </div>
    </section>