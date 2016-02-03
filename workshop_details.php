<?php
include('init.php');


//get the element id
$id=(isset($_REQUEST['id']))?$_REQUEST['id']:null;

$id = $table->sanitizeInt($id);

//create table data
$table->query("SET NAMES utf8");
$table->create_table('select * from events where id = "'.$id.'"',1,'');


	//rows loop
if($table->recordset && mysqli_num_rows($table->recordset)){
	while ($row =  mysqli_fetch_array($table->recordset, MYSQL_ASSOC)) {



	$pageTitle = $row['name'];
	$pageDesc = strip_tags($row['description']);
	include('header.php');


	// if(check_admin($user)) echo "<p align='right'><a href='event_edit.php?id=$id'>edit this page</a></p>";
		?>
		<!-- Page Title -->
	  <div class="page-title-container">
	      <div class="container">
	          <div class="row">
	              <div class="col-sm-12 wow fadeIn">
	                  <i class="fa fa-user"></i>
	                  <h1>Global Acro Calendar</h1>
	                  <p>Find or post any acrobatic event worldwide on <a href="http://acrocalendar.com">www.acrocalendar.com</a> </p>
	              </div>
	          </div>
	      </div>
	  </div>


		<!-- <p><a href="index.php">Home Page</a> > <b>training details</b></p> -->

<a name="top"></a>
<h2><?=$row['name']?></h2>
<!-- <a href="shop.php">Shop</a> >  -->



<?php
//echo date("F j, Y");

if(strtotime($row['end_time']) && $row['end_time'] != '0000-00-00 00:00:00'){
echo "<b>Start date</b>: ".date("M jS, Y",strtotime($row['start_time']))."<br>";
echo "<b>End date</b>: ".date("M jS, Y",strtotime($row['end_time']))."<br>";
} else  {
echo "<b>Date</b>: ".date("M jS, Y",strtotime($row['start_time']))."<br>";
}

echo "<b>Where</b>: ".$row['place']."<br>";
if(strlen($row['homepage']))echo "<b>Home page</b>: <a href='".$row['homepage']."' target='_blank'>".$row['homepage']."</a><br>";


//echo "<br><a href='event_show.php?id=".$_REQUEST['id']."'>read more...</a>";
?>
<!--<b>Where</b>: Ubud, Bali<br>
<b>Price</b>: 250$ course only, 400$ all inclusive<br>
<b>Contact</b>: <a href="mailto:info@flyingtherapeutics.org">info@flyingtherapeutics.org</a><br>-->


		<p><?=$row['description']?></p>




<div id="navigator">

<?php
//include('cart.php');
?>
</div>

<?php


		}
	}
	//END PERMISSIONS loop
	?>
<!--<a href="#top">&uarr; top</a>-->

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
									<a class="big-link-3" href="#">Sign Up Now!</a>
							</div>
					</div>
			</div>
	</div>
</div>




<?php include('footer.php'); ?>
