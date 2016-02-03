<?php
/* function getContent() */
/*
	TODO
	* ...
*/
function getContent($key){
  if(str_word_count($key)==0) return "NO KEY for ".$key;

  global $table;
  global $curLang;
  $lang = $curLang;

  $res = $table->query("SET NAMES utf8");
  $sql = 'select *,title_'.$lang.' as title from media where active = 1 and label ="'.$key.'" and type = "pages"';
  $media =$table->query($sql);
  //print "<hr>$sql</hr>";

  // Defining the edit button
  $button = '<button type="button"  data-toggle="modal"  data-target="#modal_edit" class="btn btn-danger btn-edit " aria-label="Left Align" style="float:right" data-key="'.$key.'">
    <span class="glyphicon glyphicon-pencil" aria-hidden="true"></span>
    </button>

    ';
    //textarea_thai_location_subtitle
    //$("#textarea_thai_location_subtitle").text('aaaa');
    $script = '


        ';

  if($media && mysqli_num_rows($media)){




      while ($row =  mysqli_fetch_array($media, MYSQL_ASSOC)) {
        //print_r($row);

      $content = $row['desc_large_en'];


     // $script2 = '<script>
      //    $("#textarea_'.$key.'").html("'.$content.'");
      //  </script>';


      $content = '<div id="content_'.$key.'">'.$content.'</div>';


      }
 return  $content;
    }
}
?>
