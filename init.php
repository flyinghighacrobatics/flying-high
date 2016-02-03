<?php
//include("classes/wfcart.php");
 $lifetime=(3600 * 24 * 7);
  session_start();
  setcookie(session_name(),session_id(),time()+$lifetime);
//  print_r(session_get_cookie_params());

date_default_timezone_set('Europe/Copenhagen');




include_once('classes/table.class.php');
$table = new tableManager();



?>
