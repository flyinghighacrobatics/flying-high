<!-- Footer -->
  <footer class="page-footer">

    <!-- Contact Us -->
      <div class="contact">
        <div class="container">
      <h2 class="section-heading">Contact Us</h2>
      <p><span class="glyphicon glyphicon-envelope"></span>
        <br><a class="mailto" href="mailto:info@flyinghighacrobatics.com">info@flyinghighacrobatics.com</a></p>

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

      <!-- Copyright etc -->
      <div class="small-print">
        <div class="container">
          <p>Copyright &copy; Flyinghighacrobatics.com 2015 - Photo Credit: Monika Kolb, Melanie Lo, Vanille Simeon</p>
        </div>
      </div>

  </footer>

  <!-- jQuery -->
  <script src="js/jquery-1.11.3.min.js"></script>

  <!-- Bootstrap Core JavaScript -->
  <script src="js/bootstrap.min.js"></script>

  <!-- Plugin JavaScript -->
  <script src="js/jquery.easing.min.js"></script>

  <!-- Custom Javascript -->
  <script src="js/custom.js"></script>


<!-- Lorenzo-s shit -->
<script type="text/javascript">
  $(document).ready(function(){
      var path = $(location).attr('href');
      var index = path.lastIndexOf("/") + 1;
      var page = path.substr(index);
      //var page = path.split("/").pop();
      console.log('page: ' + page);
      //$(".nav").find(".active").removeClass("active");
      //$(".nav li").addClass("active");
     //$.each( $('.nav li a'), function( ) {

      $( ".nav li a" ).each(function() {
      //  console.log($(this).attr('href'));
      console.log('href: ' + $(this).attr('href'));
        if($(this).attr('href').contains(page)){
          console.log('giot it !!!');
            $(this).parent().addClass('active');
            return false;
          }
          
        });
    });
</script>

</body>

</html>
