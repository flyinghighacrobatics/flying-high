<?php
/**
 * PHP Class to manage table structures (print table, order by, etc)
 *
 * <code><?php
 * include('table.class.php');
 * $table = new tableManager();
 * ? ></code>
 *
 * ==============================================================================
 *
 * @version $Id: table.class.php,v 0.93 2008/05/02 10:54:32 $
 * @copyright Copyright (c) 2007 Lorenzo Becchi (http://ominiverdi.org)
 * @author Lorenzo Becchi <lorenzo@ominiverdi.org>
 * @license http://opensource.org/licenses/gpl-license.php GNU General Public License (GPL)
 *
 * ==============================================================================

 */

/**
 * Table manager- The main class
 *
 * @param string $dbName
 * @param string $dbHost
 * @param string $dbUser
 * @param string $dbPass
 * @param string $dbQuery
 */

class tableManager{
  /*Settings*/
  /**
   * The database that we will use
   * var string
   */
  var $dbName = 'ac';
  /**
   * The database host
   * var string
   */
  var $dbHost = 'localhost';
  /**
   * The database port
   * var int
   */
  var $dbPort = 3306;
  /**
   * The database user
   * var string
   */
  var $dbUser = 'ominiverdi';
  /**
   * The database password
   * var string
   */
  var $dbPass = 'bibi1973';
  /**
   * The database query that holds all the information
   * var string
   */
  var $dbQuery  = '';

  /**
   * The variable holding the session info for this class
   * var string
   */
  var $sessionVariable  = 'myTableClass';
  var $sessionData  = array();


  /**
   * Display errors? Set this to true if you are going to seek for help, or have troubles with the script
   * var bool
   */
  var $displayErrors = true;
  /*Do not edit after this line*/
  var $userID;
  var $dbConn;
  var $userData=array();

  var $recordset; //the array of the recordset
  var $query_string; //the active query
  var $order_by; //the order by request for the query

  /**
   * table navigation variables
   */
  var $current_page; //the current page of the navigation
  var $rec_per_page = 1000; //the records per page
  var $start_page = 1; //the starting page for the navigation
  var $tot_rows; //the total number of resulting rows
  /**
   * Class Constructure
   *
   * @param string $dbConn
   * @param array $settings
   * @return void
   */
  function tableManager($dbConn = '', $settings = '')
  {
	    if ( is_array($settings) ){
		    foreach ( $settings as $k => $v ){
				    if ( !isset( $this->{$k} ) ) die('Property '.$k.' does not exists. Check your settings.');
				    $this->{$k} = $v;
			}
	    }

      if ( isset($_SERVER['SERVER_NAME']) && $_SERVER['SERVER_NAME'] == 'localhost') {
        $this->dbConn = ($dbConn=='')? mysqli_connect($this->dbHost.':'.$this->dbPort, $this->dbUser, $this->dbPass):$dbConn;
      } else {
        //$this->dbConn =  mysqli_connect(':/cloudsql/partner-acrobatics:pa-sql', 'root', 'bibi1973');
        $this->dbConn =  mysqli_connect(
  null, // host
  'root', // username
  'bibi1973',     // password
  '', // database name
  null,
  '/cloudsql/partner-acrobatics:pa-sql'
  );
      }
	    if ( !$this->dbConn ) die(mysqli_error($this->dbConn));
	    mysqli_select_db($this->dbConn, $this->dbName)or die(mysqli_error($this->dbConn));
	    if( !isset( $_SESSION ) ) session_start();
	    if ( !empty($_SESSION[$this->sessionVariable]) )
	    {
		    $this->sessionData =  $_SESSION[$this->sessionVariable];
	    }
  }

  /**
  	* writes data back to session var
  	* @return empty
  */
  function update_session_data()
  {
	$_SESSION[$this->sessionVariable] = $this->sessionData;
  }

  /**
  	* Login function
  	* @param string $uname
  	* @param string $password
  	* @param bool $loadUser
  	* @return bool
  */
  function create_table($query, $page=1, $order_by = '')
  {
    		$this->query_string = $query;
		$this->order_by = $order_by;

		$this->tot_rows = $this->get_num_rows();


		if ($this->rec_per_page > 0) {
		   $last_page = ceil($this->tot_rows/$this->rec_per_page);

			$current_page = (int)$page;
			if ($current_page > $last_page) {
			   $current_page = $last_page;
			} // if
			if ($current_page < 1) {
			   $current_page = 1;
			} // if
			$this->current_page = $current_page;


			$start = ($this->start_page-1)*$this->rec_per_page;
			$end = $start + $this->rec_per_page;

			$limit = ' LIMIT '.$start. ',' .$end;
		   $limit = 'LIMIT ' .($current_page - 1) * $this->rec_per_page .',' .$this->rec_per_page;
		} else {
		   $limit = '';
		} // if

		$order_by =($order_by)? 'ORDER BY '.$order_by:'';

		$res = $this->query($this->query_string . ' '. $order_by.' ' .$limit);
		//print (@mysql_num_rows($res));
		if ( @mysqli_num_rows($res) == 0)
			return false;

		$this->recordset = $res;

		return true;
  }


  /**
  	* Function to determine if a property is true or false
  	* param string $prop
  	* @return bool
  */
  function is($prop){
  	return $this->get_property($prop)==1?true:false;
  }

  /**
  	* Function to determine the number of records of the query
  	* @return int
  */
  function get_num_rows(){
	$res = $this->query($this->query_string);
  	return @mysqli_num_rows($res);
  }

  /**
  	* return the keys of the active recordset
  	* @return array
  */
  function get_keys(){
		$keys = array();

		if ( @mysqli_num_rows($this->recordset) == 0)
			return null;
		foreach(mysqli_fetch_array($this->recordset, MYSQL_ASSOC) as $key=>$val){
		 if($key!='id')$keys[] = $key;
		};
		mysqli_data_seek($this->recordset,0);
		/*mysqli_data_seek($res,0);*/
		return $keys;
  }

  /**
  	* return the list of all ids of the active recordset
  	* @return list
  */
  function get_ids(){
		$id_list = '';
		$sql =($this->order_by)? $this->query_string .' ORDER BY '.$this->order_by:$this->query_string;
		$res = $this->query($sql);
		//print (@mysqli_num_rows($res));
		if ( @mysqli_num_rows($res) == 0)
			return false;


		while ($r =  mysqli_fetch_array($res, MYSQL_ASSOC)) {
			//print_r($r);
		   $id_list .=($id_list=='')?$r['id']:','.$r['id'];
		};

		return $id_list;
  }
 /**
  	* updates the session data with the list of ids of the active recordset
  	* @return list
  */
  function update_session_ids(){
	$list = $this->get_ids();
	$this->sessionData['id_list'] =  $list;
	$_SESSION[$this->sessionVariable] = $this->sessionData;
  }

  /**
  	* if the query result has one record, it returns the next id in the session['id_list']
  	* @return integer
  */
  function print_prev_next_id($id){

	//print "id: ".$_REQUEST['id'];
	//print "<br>list: ".$this->sessionData['id_list'];

	$ids=explode(',',$this->sessionData['id_list']);
	$i = 0;
	$f;//first
	$p;//prev
	$a;//actual
	$n;//next
	$l;//last
	foreach ($ids as $r) {
		if($r==$id){
			$a = $ids[$i];
			$pi = $i-1;
			$ni = $i+1;
			//echo "<p>pi,ni: $pi,$ni</p>";
			$p =(isset($ids[$pi]))?$ids[$pi]:null;
			$n =(isset($ids[($ni)]))?$ids[($ni)]:null;
		}
		$i++;
	};
	print "<p>";
	if (isset($ids[0]) && $ids[0] != $id){
		   $qs = $this->replace_query_string('id='.$ids[0]);
		   echo " <a href='{$_SERVER['PHP_SELF']}?$qs'>FIRST</a> ";
	} else
		echo " FIRST";
	if (isset($p)){
		   $qs = $this->replace_query_string('id='.$p);
		   echo " <a href='{$_SERVER['PHP_SELF']}?$qs'>PREV</a> ";
	} else
		echo " PREV";

	echo " - ";

	if (isset($n)){
		   $qs = $this->replace_query_string('id='.$n);
		   echo "<a href='{$_SERVER['PHP_SELF']}?$qs'>NEXT</a> ";
	} else
		echo" NEXT";
	$tot = count($ids)-1;
	if (isset($ids[$tot]) && $ids[$tot] != $id){
		   $qs = $this->replace_query_string('id='.$ids[$tot]);
		   echo " <a href='{$_SERVER['PHP_SELF']}?$qs'>LAST</a> ";
	} else
		echo " LAST";
	print "</p>";
	//print_r($ids);
	//print "<br>p:$p,a:$id,n:$n<br>";

  }




  /**
  	* print the navigation bar
  	* @return void
  */
  function nav_print() {

	$tot = $this->tot_rows;
	$last_page = ceil($tot/$this->rec_per_page);
	$current_page = $this->current_page;

	//print tot results
	//echo '<p>results: '.$tot.'</p>';
	if($tot>0){
		//print nav bar
		if ($current_page == 1) {
	 	  echo " FIRST PREV ";
		} else {
		   $qs = $this->replace_query_string('page=1');
		   echo " <a href='{$_SERVER['PHP_SELF']}?$qs'>FIRST</a> ";
		   $prev_page = $current_page-1;
		   $qs = $this->replace_query_string("page=$prev_page");
		   echo " <a href='{$_SERVER['PHP_SELF']}?$qs'>PREV</a> ";
		} // if

		echo " ( Page $current_page of $last_page ) ";

		if ($current_page == $last_page) {
		   echo " NEXT LAST ";
		} else {
		   $next_page = $current_page+1;
		   $qs = $this->replace_query_string("page=$next_page");
		   echo " <a href='{$_SERVER['PHP_SELF']}?$qs'>NEXT</a> ";
		   $qs = $this->replace_query_string("page=$last_page");
		   echo " <a href='{$_SERVER['PHP_SELF']}?$qs'>LAST</a> ";
		} // if
	}
	//<p> <a href="">first</a> - <a href="">prev</a> - page '.$current_page.' of '.$last_page.' - <a href="">prev</a> - <a href="">last</a> </p>';

  }

/**
	* Check if a value is already present in a table column
	* @acces public
	* @params string $table string $column mixed  $value
	* @return boolean
	* by kappu

**/
  function unique($table, $column, $value){
	$sql='';
	if(is_numeric($value))
		$sql="SELECT * FROM $table WHERE $column=$value";
	else 	$sql="SELECT * FROM $table WHERE $column=\"$value\"";
	$res=$this->query($sql);
	if ( @mysqli_num_rows($res) == 0)
		return true;
	else 	return false;


 }

  ////////////////////////////////////////////
  // PRIVATE FUNCTIONS
  ////////////////////////////////////////////

  /**
  	* SQL query function
  	* @access private
  	* @param string $sql
  	* @return string
  */
  function query($sql, $line = 'Uknown')
  {
    //print $sql;

    //DEFINE ENCODING
    mysqli_query($this->dbConn, "SET NAMES utf8") or die('table class Query error') ;

    //QUERY
    $res = mysqli_query($this->dbConn,$sql);
    if ( !$res )
      $this->error(mysqli_error($this->dbConn), $line);
  //    print_r($res);
  //  $this->tot_rows =  $res->num_rows;
    return $res;
    }
 // //print $sql;
 // mysqli_db_query($this->dbConn, $this->dbName,"SET NAMES utf8", );
 //
 // //if (defined('DEVELOPMENT_MODE') ) echo '<b>Query to execute: </b>'.$sql.'<br /><b>Line: </b>'.$line.'<br />';
 // $res = mysqli_db_query($this->dbName, $sql, $this->dbConn) or die('table class Query error') ;
 // if ( !$res )
 // 	$this->error(mysqli_error($this->dbConn), $line);
 // return $res;
 //  }



  /**
  	* Produces the result of addslashes() with more safety
  	* @access private
  	* @param string $str
  	* @return string
  */
  function escape($str) {
    $str = get_magic_quotes_gpc()?stripslashes($str):$str;
    $str = mysqli_real_escape_string($str, $this->dbConn);
    return $str;
  }

    /**
  	* Sanitize a string from injection getting only the string before a space
  	* @access private
  	* @param string $str
  	* @return string
  */
  function sanitize($str) {
    $str = explode(' ', $str);
    $str = $str[0];
    return $str;
  }

        /**
  	* Sanitize a INT from injection getting only the string before a space
  	* @access private
  	* @param string $str
  	* @return string
  */
   function sanitizeInt($str) {
    $str = explode(' ', $str);
    $str = abs($str[0]);
    return $str;
  }
  /**
  	* Error holder for the class
  	* @access private
  	* @param string $error
  	* @param int $line
  	* @param bool $die
  	* @return bool
  */
  function error($error, $line = '', $die = false) {
    if ( $this->displayErrors )
    	echo '<b>Error: </b>'.$error.'<br /><b>Line: </b>'.($line==''?'Unknown':$line).'<br />';
    if ($die) exit;
    return false;
  }

  /**
  	* replace key/value pairs in query strings
  	* @access private

  	* @param string $nq
  	* @return string

  */
  function replace_query_string($nq){
	$na =explode('&',$nq);
	$q = $_SERVER['QUERY_STRING'];
	$res = array();
	$qa = explode('&',$q);
	foreach($qa as $a){
		//print "<p>a:$a</p>";
		if(strstr($a,'=')){
			$aa =explode('=',$a);
			$ak = $aa[0];
			$av = $aa[1];
			if($ak!='del')$res[$ak]= $av;
		}

	}
	//print_r($res);
	foreach($na as $n){
		//print "<p>n:$n</p>";
		if(strstr($n,'=')){
		$nn = explode('=',$n);
		$nk = $nn[0];
		$nv = $nn[1];
		$res[$nk]= $nv;
		}
	}
	//print_r($res);
	$q ='';
	foreach($res as $k=>$r){
		$q.=(strlen($q)>0)? '&'.$k."=".$r:$k."=".$r;
	}
	//print "<p>q: $q</p>";
	return $q;
  }
}
?>
