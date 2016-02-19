<?php
$pageTitle = 'Flying High Acrobatics - Manuscripts and other resources';
include('header.php');
 ?>
 <!-- Page Title -->
 <div class="page-title-container">
     <div class="container">
         <div class="row">
             <div class="col-sm-12 wow fadeIn">
                 <i class="fa fa-user"></i>
                 <h1>Manuscripts & other resources</h1> <br>
                 <p>Sport Science Manuscripts, Research studies & Theory related to sustianable practice, injury prevention, movement diversity and performance enhancment.</p>
             </div>
         </div>
     </div>
 </div>

 <!-- <div class="services-full-width-container">
   <div class="container">
       <div class="row">
           <div class="col-sm-12 services-full-width-text wow fadeInLeft">
               <h3>Take Your Training To The Next Level!</h3>
               <p>
                 Join <span class='violet'>Flying High Acrobatics </span> for

                <iframe width="560" height="315" src="https://www.youtube.com/embed/videoseries?list=PLItqyWEx3szgltEGrgGUZ684hXTP03GYZ" frameborder="0" allowfullscreen></iframe>
               </p>


             </div>
             </div>
             </div>
             </div> -->
             <div class="portfolio-container">
               <div class="container">
                   <div class="row">

                     <div class="col-sm-12 wow fadeInRight">
                       <div class="about-us-text">
                       <p> Check out the manuscript written by Flying High Acrobatics founder
                         <span class'violet'>Martin Kvist</span> for <strong>Partner Acrobatics</strong>:<br>
                        <h5> "The Effects of strength and balance training on fatigue related injury risk".<h5>

                                               <!-- Empower your training with knowledge today! -->
                       </p>
                    </div>
                    <button type="button" class="btn btn-info btn-lg" data-toggle="modal" data-target="#ModalMM">Read it!</button>

                     </div>
                     <!-- <div class="col-sm-12 wow fadeInLeft">
                           <iframe width="100%" height="550" src="http://partneracrobatics.com/articles.php">
                 </iframe>
               </div> -->
               <!-- Modal -->
               <div id="ModalMM" class="modal fade" role="dialog">
                 <div class="modal-dialog">

               <!-- Modal content-->
               <div class="modal-content">
                 <div class="modal-header">
                   <button type="button" class="close" data-dismiss="modal">&times;</button>
                   <h4 class="modal-title">"The effects of strength and balance training on fatigue related injury risk"</h4>
                   <h5 class="modal-title"> By M. Kvist, Bsc. Sport Science, April 6.th 2015</h5>
                 </div>
                 <div class="modal-body">
                   <?php
                    include('articles/fatigue1.php');
                    ?>
   <!-- <iframe width="100%" height="550" src="http://partneracrobatics.com/articles.php"> -->

                 </div>
                 <div class="modal-footer">
                   <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                 </div>
               </div>

             </div>
           </div>
  <!-- End Modal -->

             </div>
             <!-- Row -->
             <div class="row">

               <div class="col-sm-12 wow fadeInRight">
                 <div class="about-us-text">
                   <h4> Scapular position in recreational overhead athletes with and without pain.</h4>
                 <p>
                   Poster version of the unpublished manuscript for the shoulder pain study done in collaboration with Partner Acrobatics at the Mexico TT 2015
                                         <!-- Empower your training with knowledge today! -->
                 </p>
              </div>
              <button type="button" class="btn btn-info btn-lg" data-toggle="modal" data-target="#ModalMM2">Read it!</button>

               </div>
               <!-- <div class="col-sm-12 wow fadeInLeft">
                     <iframe width="100%" height="550" src="http://partneracrobatics.com/articles.php">
           </iframe>
         </div> -->
         <!-- Modal -->
         <div id="ModalMM2" class="modal fade" role="dialog">
           <div class="modal-dialog">

         <!-- Modal content-->
         <div class="modal-content">
           <div class="modal-header">
             <button type="button" class="close" data-dismiss="modal">&times;</button>
             <h4 class="modal-title">"Scapular position in recreational overhead athletes with and without pain."</h4>
             <h5 class="modal-title"> By M. Kvist, Stud. Msc. Sport Science, Feb 18.th 2016</h5>
           </div>
           <div class="modal-body">
            <a href="assets/img/AAU_poster_WEB.jpg"> <img width="100%" height="550" class="img-responsive"  src="assets/img/AAU_poster_WEB.jpg" /> </a>


           </div>
           <div class="modal-footer">
             <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
           </div>
         </div>

       </div>
     </div>
<!-- End Modal -->

       </div>
             </div>
<!--container  -->
           </div>


 <!-- <div class="slider-container">
      <div class="container">
          <div class="row">
              <div class="col-sm-10 col-sm-offset-1 slider">
              <div class="flexslider">
  <ul class="slides">
 <li data-thumb="assets/img/slider/19.jpg">
     <img src="assets/img/slider/19.jpg">
     <div class="flex-caption">
       Are you moving or being moved? <br> ..... with <span class='violet'>The Maitri Movement</span> May ......
     </div>
</ul>
</div>
</div>
</div>
</div>
</div> -->

     <!-- Presentation -->
  <!--   <div class="presentation-container">
       <div class="container">
         <div class="row">
           <div class="col-sm-12 wow fadeInLeftBig">
             <h1><span class="violet">Flying High</span> Acrobatics...
                                 </h1>
             <p>Turning sparks of <span class='violet'>possibility</span> into flames of <span class='violet'>achievement</span>,
                and building <span class='violet'>trust</span> all over the world...</p>

             </div> -->
       <!--      <div class="col-sm-12 wow fadeInLeftBig">

       </div>-->


       <!-- Call To Action -->
       <div class="call-to-action-container">
         <div class="container">
             <div class="row">
                 <div class="col-sm-12 call-to-action-text wow fadeInLeftBig">
                     <p>
                       The event you have been waiting for is here! Together with Partner Acrobatics we present <span class="violet">Advanced Acrobatics Training</span>, nine days of flying high acrobatics
                       at an amazing location in Andalusia, Spain.
                     </p>
                     <div class="call-to-action-button">
                         <a class="big-link-3" href="event-advmay.php">More Info</a>
                     </div>
                 </div>
             </div>
         </div>
       </div>




<?php
include('footer.php');
?>
