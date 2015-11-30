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
                      <form id="contact" name="contact" method="post" enctype="multipart/form-data" action="assets/fmsendmail.php">
                      <div class="TectiteFormDesignerField">
                      <label for="field3" class="TectiteRequiredField">Name</label><input type="text" id="field3" name="FullName"  />
                      </div>
                      <div class="TectiteFormDesignerField">
                      <label for="field2" class="TectiteRequiredField">Your email address</label><input type="text" id="field2" name="EmailAddr"  />
                      </div>
                      <div class="TectiteFormDesignerField">
                      <label for="field4" class="TectiteRequiredField">Subject</label><input type="text" id="field4" name="subject"  />
                      </div>
                      <div class="TectiteFormDesignerField">
                      <label for="field5" class="TectiteRequiredField">Message</label><textarea id="field5" name="message" rows="20" cols="40"></textarea>
                      </div>
                      <div class="TectiteFormDesignerField TectiteButtonField">
                      <input type="submit" id="submit" value="Submit" name="submit" />
                    </div>
                      <!-- NOTE: do not remove the following links if you are using our Hosted Forms on a Free Plan.
                           Removing the links will cause your form to be disabled! You can upgrade to a paid plan
                           and then safely remove the links.
                           If you are using your own copy of FormMail, you can remove the links without an issue,
                           though we would appreciate it if you left them here.
                      -->
                      <a id="PoweredByLink" class="PoweredByFormMail" href="http://www.tectite.com/" target="_blank"><img id="PoweredByImg" src="http://www.tectite.com/images/FormMail_rnd_blue.png" alt="Badge for Tectite supplied web form" title="Use Tectite FormMail for your contact form" border="0" /></a>
                      <input type="hidden" name="required" value="FullName:Name,EmailAddr:Your email address,subject:Subject,message:Message" />
                      <input type="hidden" name="derive_fields" value="email = EmailAddr,realname = FullName" />
                      <input type="hidden" name="subject" value="contact Form Submission" />
                      <input type="hidden" name="good_url" value="/thanks.php" />
                      <input type="hidden" name="recipients" value="info@flyinghighacrobatics.com" />
                      </form>
                      </div>
                      <!-- NOTE: do not remove the following links if you are using our Hosted Forms on a Free Plan.
                           Removing the links will cause your form to be disabled! You can upgrade to a paid plan
                           and then safely remove the links.
                           If you are using your own copy of FormMail, you can remove the links without an issue,
                           though we would appreciate it if you left them here.
                      -->
                      <div id="TectiteLink" style="clear:both;width:80%;margin:5px auto;text-align:center;">Visit Tectite for free <a href="http://www.tectite.com/">contact form</a> solutions.<script type="text/javascript">
                                              if (document.getElementById("PoweredByLink"))
                                                  document.getElementById("TectiteLink").setAttribute("style","display:none;");
                                           </script></div>
                      <script type="text/javascript" src="http://cdn.tectite.com/formtest-v2.js"></script>

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
