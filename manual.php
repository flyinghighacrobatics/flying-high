<?php
$pageTitle ='Partner Acrobatics Manual';
include('header.php');
include('pa-init.php');
echo "<div class='content manual'>";



?>

<script>
ga('set','contentGroup5','Manual');
</script>
<?php



	//FULL TREE MENU
	$res = $table->query("SET NAMES utf8");
	$media =$table->query('select *,title_'.$curLang.' as title, parent_id from media where active = 1 and type = "manual"  ORDER BY parent_id,position,title  ASC');

	$menuItems = array();
	if(isset($media) && $media->num_rows){
			while ($row =  mysqli_fetch_array($media)) {

			$row['Parent'] =$row['parent_id'];
			$row['parent'] =$row['parent_id'];
			/*
			if($curLang=='es'){
				echo $curLang;
				$row['title']=($row['title_es'])?$row['title_es']:$row['title_en'];
			} else {
				$row['title']=$row['title_en'];
			}*/
			$menuItems[] = $row;
			}
		}

	$items = array_process_for_ids($menuItems);
	//print_r($items);




  /*
      ITEM PAGE
  */
if(isset($_REQUEST['id']) && is_numeric($_REQUEST['id'])){





	$id = $_REQUEST['id'];
	$id = $table->sanitizeInt($id);

	$prev = get_previous_item($items,$id);
	$next = get_next_item($items,$id);

	$media =$table->query('select * from media where id = '.$id.'  ');

		while ($row =  mysqli_fetch_array($media)) {

		$title = '';
		if($curLang=='es'){
					$title=($row['title_es'])?$row['title_es']:$row['title_en'];
				} else {
					$title =$row['title_en'];
				}


        //CHECKING RECENT POSTS
        $ts1 = date( "Y-m-d H:i:s", strtotime( "-1 month" ) );
        $ts2 =  date( "Y-m-d H:i:s",strtotime($row['update_ts']));
        $datetime1 = new DateTime($ts1);
        $datetime2 = new DateTime($ts2);
        $interval = $datetime2->diff($datetime1);
        $diff =  $interval->format('%R%a');
        $new =(intval($diff) < 60)?'- <span style="color:red">updated!</span>':'';


        echo "<h1>$title $new</h1>";

        //BREADCRUMBS MENU

       breadcrumb($items,$id);


			if(check_moderator()){
				echo '<button type="button"  data-toggle="modal"  data-target="#modal_edit" class="btn btn-danger btn-edit " aria-label="Left Align" style="float:right" data-key="manual_'.$id.'">
			    <span class="glyphicon glyphicon-pencil" aria-hidden="true"></span>
			    </button>';
				//echo "<p align='right' class='list-group'>aaa<a href='adm_manual_edit.php?id=$row[id]'class='list-group-item'>Edit this page</a></p>";
			}
			?>
			<!--<a name='content'></a>-->
			<?php
				$desc='';
				if($curLang=='es'){
					$desc=($row['desc_large_es'])?$row['desc_large_es']:$row['desc_large_en'];
				} else {
					$desc =$row['desc_large_en'];
				}


			?>
			<p><?=$desc;?></p>



			<?php

			print_children($items,$id);


			breadcrumb($items,$id);

		}



		?>


<!--  Facebook comments -->
<?php /* ?>
<?php $commenturl="http://".$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI'];?>

<hr>
<p></p>
<div class="fb-comments" data-href="<?php echo $commenturl?>" data-numposts="5"
data-colorscheme="light"></div>

<?php */ ?>

<!-- Facebook Comments ends -->



	<?php

  /*
      ITEM PAGE ENDS
  */



} elseif (isset($_REQUEST['toc']) && ($_REQUEST['toc'] == 1)){
	/*
				TABLE OF CONTENTS
	*/

print "<h1>Acro Manual - Table of contents</h1>";
print '<ol class="breadcrumb"><li><a href="manual.php">Acro Manual</a></li> <li>Table of contents</li></ol>';
print '<div class="container-fluid" style="font-size:1.2em;padding:1em">';
print menu($items);
print '</div>';
print '<ol class="breadcrumb"><li><a href="manual.php">Acro Manual</a></li> <li>Table of contents</li></ol>';


	} else {
    /*
        MANUAL 1st PAGE
    */
		echo "<h1>Partner Acro Manual</h1>";

	?>
	<p><?=getContent('acro_manual_description');?></p>


	<?php

	//print "<div	class='list-group'>";
  //menu1stPage($items);
	//print "</div>";

	print "<div>";
	print "<h3>Navigate by Category</h3>";
	//CHECK FOR CHILDREN
	print_children($items,0);
	print "</div>";

	print "<div>";
	print "<h3>Navigate by TOC</h3>";
	print "<p>Get the full <a href='manual.php?toc=1'>table of contents</a>.</p>";
	print "</div>";




  /*
      MANUAL 1st PAGE ENDS
  */

	}



	?>



<!--	<div class="panel panel-success">
	  <div class="panel-heading">Want to come for free to our Teacher Training?</div>
	  <div class="panel-body">
	    <a href="base-this-am.php">click here for the #basethis challenge</a><br>
	  </div>
	</div>

-->


	<?php


echo "</div><!--. content -->";





include('footer.php');

?>

<?php
//FUNCTIONS




function array_process_for_ids($items) {
	$new_array = array();
	foreach ($items as $item) {
		$new_array[$item['id']] = $item;
	}
	return $new_array;
}

function menu($items) {
	function menu_recursive($parent_item) {
		global $items;
		unset($items[$parent_item['id']]);
		echo '<div style="padding-left: 3em;">';
		echo '- <a href="'.$_SERVER['PHP_SELF'].'?id='.$parent_item['id'].'&title='.urlencode($parent_item['title'].' - Acro Manual').'#content" title="'.$parent_item['title'].' - Acro Manual'.'">'.$parent_item['title'].'</a> ';

    $ts1 = date( "Y-m-d H:i:s", strtotime( "-1 month" ) );
    //echo "$ts1 <br>";
    $ts2 =  date( "Y-m-d H:i:s",strtotime($parent_item['update_ts']));
    //echo "$ts2 <br>";

    //CHECKING RECENT POSTS
    $datetime1 = new DateTime($ts1);
    $datetime2 = new DateTime($ts2);
    $interval = $datetime2->diff($datetime1);
    $diff =  $interval->format('%R%a');
    if(intval($diff) < 60) echo '- <span style="color:red">updated!</span>';


		foreach ($items as $item) {
			if ($item['parent'] == $parent_item['id']) {
				menu_recursive($item);
			}
		}


		//closing the button
		echo  '</div>';
	}
	foreach ($items as $item) {
		if ($item['parent'] == 0) menu_recursive($item);
	}
}



function get_previous_item($items,$id){
	$prev = null;
	foreach ($items as $item) {

			if ($item['id'] == $id) {
				return $prev;
			}
			$prev = $item;
		}

	return null;

}
function get_next_item($items,$id){
	$next = null;
	$ritems = array_reverse ($items);
	foreach ($ritems as $item) {

			if ($item['id'] == $id) {
				return $next;
			}
			$next = $item;
		}
	return null;
}

function get_current_count($items,$id){
	$i = 1;
	$next = null;
	foreach ($items as $item) {

			if ($item['id'] == $id) {
				return $i;
			}
			$i++;
		}
	return null;
}

function get_children($items,$id){
	$c = array();
	$next = null;
	foreach ($items as $item) {

			if ($item['parent'] == $id) {
				$c[]= $item;
			}

		}
	return $c;
}

function breadcrumb($items,$id) {
	$firstId = $id;
	unset($nodes);
	$nodes = array();
	if (!function_exists('menu_crumb')){
	function menu_crumb($items,$id,$firstId,$nodes) {
		$print=false;

		$itemsP = $items;
  foreach ($items as $item) {
    if ($item['id'] == $id) {
			$i = 0;
			$nodes[] =($firstId==$id)? "<li>$item[title]</li>":"<li><a href='manual.php?id=$id&title=$item[title]'>$item[title]</a></li>";
			if($item['parent_id']==0) {
				$nodes[] =  "<li><a href='manual.php'>Acro Manual</a></li>";
				$print=true;
			}
			if($item['id']==$id){
				if($item['id']!=0)menu_crumb($items,$item['parent'],$firstId,$nodes);
			}
    }
  }
		if($print){
			array_flip($nodes);
			echo '<div><ol class="breadcrumb">';
			$flipped = array_reverse($nodes);
			//print_r($flipped);
				echo implode(" ",$flipped);
			echo '</ol></div>';
		}

	} //.menu_crumb
}//.if function exists

	 menu_crumb($items,$id,$firstId,$nodes);

}


function print_children($items,$id){
	global $label;
	global $curLang;
	$c = get_children($items,$id);
	if(count($c)){
	echo "<div class='row list-group' style='margin:auto;margin-bottom:1em'>";
		foreach ($c as $item) {


			//CHECKING RECENT POSTS
			$ts1 = date( "Y-m-d H:i:s", strtotime( "-1 month" ) );
			$ts2 =  date( "Y-m-d H:i:s",strtotime($item['update_ts']));
			$datetime1 = new DateTime($ts1);
			$datetime2 = new DateTime($ts2);
			$interval = $datetime2->diff($datetime1);
			$diff =  $interval->format('%R%a');
			$new =(intval($diff) < 60)?'- <span style="color:red">'.$label[$curLang]['manual_updated'].'</span>':'';

			$title =($curLang=='es' && ($item['title_es']))?$item['title_es']:$item['title_en'];
			echo "<a href='manual.php?id=$item[id]&title=".urlencode($title.' - Acro Manual')."&parent=$item[parent_id]#content' title='".$title.' - Acro Manual'."' class='list-group-item  col-lg-3  col-md-4 col-sm-6 col-xs-10'>  $title $new</a>\n";

		}
	echo "</div><!--.children -->
	";

	}
}
//history_back();
//clear_history();




?>
