<!-- Footer -->
<footer>
    <div class="container">
        <div class="row">
            <div class="col-sm-3 footer-box wow fadeInUp">
                <h4>About Us</h4>
                <div class="footer-box-text">
                  <p>
                  Building trust ,and turning sparks of possibility into flames of achievement, all over the world...
                  </p>
                  <p><a href="about.php">Read more...</a></p>
                </div>
            </div>
            <!-- mailchimp -->
            <!-- Begin MailChimp Signup Form -->
            <div class="col-sm-3 footer-box footer-box-text footer-box-text-subscribe wow fadeInDown">

                  <div id="mc_embed_signup">
                  <form action="//flyinghighacrobatics.us11.list-manage.com/subscribe/post?u=74986ceec05d2cd314d52c92c&amp;id=baa729c35b" method="post" id="mc-embedded-subscribe-form" name="mc-embedded-subscribe-form" class="validate" target="_blank" novalidate>
                      <div id="mc_embed_signup_scroll">
                  	<label for="mce-EMAIL">Subscribe for news and upcoming events</label>
                  	<input type="email" value="" name="EMAIL" class="email" id="mce-EMAIL" placeholder="email address" required>
                      <!-- real people should not fill this in and expect good things - do not remove this or risk form bot signups-->
                      <div style="position: absolute; left: -5000px;" aria-hidden="true"><input type="text" name="b_74986ceec05d2cd314d52c92c_baa729c35b" tabindex="-1" value=""></div>
                      <div class="clear"><input type="submit" value="Subscribe" name="subscribe" id="mc-embedded-subscribe" class="button"></div>
                      </div>
                  </form>
                  </div>
</div>

                  <!--End mc_embed_signup-->

            <!--mailchimp
            <div class="col-sm-3 footer-box wow fadeInDown">
                <h4>Email Updates</h4>
                <div class="footer-box-text footer-box-text-subscribe">
                  <p>Enter your email and you'll be one of the first to get new updates:</p>
                  <form role="form" action="assets/subscribe.php" method="post">
                  <div class="form-group">
                    <label class="sr-only" for="subscribe-email">Email address</label>
                      <input type="text" name="email" placeholder="Email..." class="subscribe-email" id="subscribe-email">
                    </div>
                    <button type="submit" class="btn">Subscribe</button>
                </form>
                <p class="success-message"></p>
                <p class="error-message"></p>
                </div>
            </div>-->
            <!-- Fb like button-->
            <div class="col-sm-3 footer-box wow fadeInUp">
                <h4>Like us on Facebook</h4>
                <div class="footer-box-text">
            <div
        class="fb-like"
        data-layout="button_count"
        data-href="https://www.facebook.com/Flyinghighacrobatics"
        data-share="true"
        data-width="450"
        data-show-faces="false"
        style="padding:1em ">

</div>
</div>
</div>
<!-- end fb-->
            <div class="col-sm-3 footer-box wow fadeInDown">
                <h4>Contact Us</h4>
                <div class="footer-box-text footer-box-text-contact">
                  <p><i class="fa fa-user"></i>Flying High Acrobatics IVS </p>
                  <p><i class="fa fa-map-marker"></i>Vester Vænge Alle 33 <br>9000 Aalborg,<br> Nordjylland, Denmark</p>
                  <!-- <p><i class="fa fa-phone"></i> Phone: (+45) 42175064</p> -->

                  <p><i class="fa fa-envelope"></i> Email: <a href="">info@flyinghighacrobatics.com</a></p>
                </div>
            </div>
        </div>
        <div class="row">
          <div class="col-sm-12 wow fadeIn">
            <div class="footer-border"></div>
          </div>
        </div>
        <div class="row">
            <div class="col-sm-7 footer-copyright wow fadeIn">
                <p>Copyright &copy; Flying High Acrobatics IVS 2016 - Photo Credit: <a href="http://barefootyoga.me/">Ishine Photography</a> <br>
                  <!-- Melanie Höld, Monika Kolb, Melanie Lo, Vanille Simeon.--> Template by <a href="http://azmind.com">Azmind</a></p>

            </div>
        <!--    <div class="col-sm-5 footer-social wow fadeIn">
                <a href="https://www.facebook.com/kvistkunst"><i class="fa fa-facebook"></i></a>
                <a href="#"><i class="fa fa-dribbble"></i></a>
                <a href="#"><i class="fa fa-twitter"></i></a>
                <a href="#"><i class="fa fa-pinterest"></i></a>
            </div> -->
        </div>
    </div>
</footer>

<!-- Javascript -->
<script src="assets/js/jquery-1.11.1.min.js"></script>
<script src="assets/bootstrap/js/bootstrap.min.js"></script>
<script src="assets/js/bootstrap-hover-dropdown.min.js"></script>
<script src="assets/js/jquery.backstretch.min.js"></script>
<script src="assets/js/wow.min.js"></script>
<script src="assets/js/retina-1.1.0.min.js"></script>
<script src="assets/js/jquery.magnific-popup.min.js"></script>
<script src="assets/flexslider/jquery.flexslider-min.js"></script>
<script src="assets/js/jflickrfeed.min.js"></script>
<script src="assets/js/masonry.pkgd.min.js"></script>
<script src="http://maps.google.com/maps/api/js"></script>
<script src="assets/js/jquery.ui.map.min.js"></script>
<script src="assets/js/fmsendmailscripts.js"></script>


<!-- Lorenzo-s shit -->
<script type="text/javascript">
  $(document).ready(function(){
      var path = $(location).attr('href');
      var index = path.lastIndexOf("/") + 1;
      var page = path.substr(index);
      if(page=='') page = '/';
      console.log('page: ' + page);

      $( ".nav li a" ).each(function() {
      console.log('href: ' + $(this).attr('href'));
      var xxx = $(this).attr('href');
//      console.log('length: ' + xxx.length);
      var yyy = '/'+page+'/';
      var re = new RegExp(yyy, 'g');
      var zzz = xxx.match(re);
      console.log('xxx: ' + xxx);
      console.log('length: ' + xxx.length);
      if((xxx) && xxx == page){
          console.log('giot it !!!');
            $(this).parent().addClass('active');
            return false;
      } else {
            return true;
      }

        });
    });
</script>
</body>

</html>
