<?php
$pageTitle = 'Contact';
include('header.php');
error_reporting(-1);
ini_set('display_errors', 'On');
 ?>

        <!-- Page Title -->
        <div class="page-title-container">
            <div class="container">
                <div class="row">
                    <div class="col-sm-12 wow fadeIn">
                        <i class="fa fa-envelope"></i>
                        <h1>Contact Us /</h1>
                        <p>Here is how you can contact us.</p>
                    </div>
                </div>
            </div>
        </div>

        <!-- Contact Us -->
        <div class="contact-us-container">
        	<div class="container">
	            <div class="row">
	                <div class="col-sm-7 contact-form wow fadeInLeft">
	                    <p>
	                    Feel free to use this form to contact us  with any questions or requests you may have...<br> Use it to request further information
                       about a training, workshop, course, lecture or retreat. For booking personal training, privates or other programming
                       use this form, or contact <span class='violet'>Martin</span> directly on
                       <a href='mailto:martin@flyinghighacrobatics.com'>martin@flyinghighacrobatics.com</a>.<br>  Don't forget to subscribe
                       to our updates.<br>    	Thank you!
	                    </p>
	                    <form role="form" action="assets/sendmail.php" method="post">
	                    	<div class="form-group">
	                    		<label for="contact-name">Name</label>
	                        	<input type="text" name="name" placeholder="Enter your name..." class="contact-name" id="contact-name">
	                        </div>
	                    	<div class="form-group">
	                    		<label for="contact-email">Email</label>
	                        	<input type="text" name="email" placeholder="Enter your email..." class="contact-email" id="contact-email">
	                        </div>
	                        <div class="form-group">
	                        	<label for="contact-subject">Subject</label>
	                        	<input type="text" name="subject" placeholder="Your subject..." class="contact-subject" id="contact-subject">
	                        </div>
	                        <div class="form-group">
	                        	<label for="contact-message">Message</label>
	                        	<textarea name="message" placeholder="Your message..." class="contact-message" id="contact-message"></textarea>
	                        </div>
	                        <button type="submit" class="btn">Send</button>
	                    </form>
	                </div>
	              <div class="col-sm-5 contact-address wow fadeInUp">

	                  <h3>Where We Are, For The Moment..</h3>
	                    <div class="map"></div>
	                    <h3>Address <i class="fa fa-home"></i> <i class="fa fa-envelope"></i></h3>
	                    <p>Vester Vænge Alle 33 <br> 9000, Aalborg.<br>
                        Denmark</p>
	                    <p>Phone: (+45) 42175065</p>
	                </div>
	            </div>
	        </div>
        </div>

                 <?php
                 include('footer.php');
                  ?>
