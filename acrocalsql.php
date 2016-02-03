<?php
$pageTitle = 'Flying High Acrobatics - Acro Calendar';
include('init.php');
include('header.php');
 ?>

 <!-- Page Title -->
 <div class="page-title-container">
     <div class="container">
         <div class="row">
             <div class="col-sm-12 wow fadeIn">
                 <i class="fa fa-user"></i>
                 <h1>Global Acro Calendar</h1><br>
                 <p>Find or post any acrobatic event worldwide on <a href="http://acrocalendar.com">www.acrocalendar.com</a> </p>
             </div>
         </div>
     </div>
 </div>




<?php
//query for actual events:
$query = "select *, DATE_FORMAT(start_time, '%M - %Y') as MM from events WHERE NOW() BETWEEN  start_time AND end_time";
$table->create_table($query,'','');
//DATE_FORMAT('2009-10-04 22:23:00', '%W %M %Y')

	if(isset($table->recordset) && mysqli_num_rows($table->recordset)){

	$w_n =(mysqli_num_rows($table->recordset)>1)?'s':'';
	?>

	<h4>Ongoing training<?=$w_n;?></h4>

	<?php
	$month ='';

		while ($row =  mysqli_fetch_array($table->recordset, MYSQL_ASSOC)) {
			if($month!=$row['MM']){
				$month =$row['MM'];
				echo "<h5>$row[MM] </h5>";
			}
			echo "<div class='event ongoing' itemscope itemtype='http://data-vocabulary.org/Event'>";
		echo "<a href='workshop_details.php?id=$row[id]' itemprop='url'><span itemprop='summary' >$row[name]</span></a><br>";
		echo "<small>";
		if(strtotime($row['end_time'])){
		//echo "<b>".date("M jS, Y",strtotime($row['start_time']))."</b> to ";
		echo "<b><time itemprop='startDate' datetime='".$row['start_time']."'>".date("M jS",strtotime($row['start_time']))."</time></b> to ";
		echo "<b><time itemprop='endDate' datetime='".$row['end_time']."'>".date("M jS",strtotime($row['end_time']))."</time></b>";
		} else  {
		echo "<b>".date("M jS",strtotime($row['start_time']))."</b>";
		}
		echo "</small><br>";

		if(strlen($row['place']))echo "Location: <span itemprop='location' itemscope itemtype='http://data-vocabulary.org/​Organization'><b><span itemprop='locality'>".$row['place']."</span></b></span><br>";
		echo "<span  itemprop='description'>".$row['short_desc']."</span>";
		echo "</div>

		";
		}
	?>
	<?php
	}

//query for future events:
$query = "select *, DATE_FORMAT(start_time, '%M - %Y') as MM from events WHERE active = true AND start_time >= NOW() ORDER BY start_time ASC";
$table->create_table($query,'','');

if(isset($table->recordset) && mysqli_num_rows($table->recordset)){

$w_n =(mysqli_num_rows($table->recordset)>1)?'s':'';
?>

<h4>Upcoming training<?=$w_n;?></h4>

<?php
	$month ='';

	while ($row =  mysqli_fetch_array($table->recordset, MYSQL_ASSOC)) {
			if($month!=$row['MM']){
				$month =$row['MM'];
				echo "<h5>$row[MM] </h5>";
			}
		echo "<div class='event ongoing' itemscope itemtype='http://data-vocabulary.org/Event'>";
		echo "<a href='workshop_details.php?id=$row[id]' itemprop='url'><span itemprop='summary' >$row[name]</span></a><br>";
		echo "<small>";
		if(strtotime($row['end_time'])){
		//echo "<b>".date("M jS, Y",strtotime($row['start_time']))."</b> to ";
		echo "<b><time itemprop='startDate' datetime='".$row['start_time']."'>".date("M jS",strtotime($row['start_time']))."</time></b> to ";
		echo "<b><time itemprop='endDate' datetime='".$row['end_time']."'>".date("M jS",strtotime($row['end_time']))."</time></b>";
		} else  {
		echo "<b>".date("M jS",strtotime($row['start_time']))."</b>";
		}
		echo "</small><br>";

		if(strlen($row['place']))echo "Location: <span itemprop='location' itemscope itemtype='http://data-vocabulary.org/​Organization'><b><span itemprop='locality'>".$row['place']."</span></b></span><br>";
		echo "<span  itemprop='description'>".$row['short_desc']."</span>";
		echo "</div>

		";
	}
?>
<?php
}
?>
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
                         <a class="big-link-3" href="event-advmay.php">More Info!</a>
                     </div>
                 </div>
             </div>
         </div>
       </div>




<?php
include('footer.php');
?>
