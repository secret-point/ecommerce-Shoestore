<?php
$thisPageName = basename($_SERVER["PHP_SELF"]);
if($thisPageName == 'core.inc.php')
{
	header('Location: index.php');
}


ob_start(); // starts output buffering
session_start();
$current_file = $_SERVER['SCRIPT_NAME'];
if (isset($_SERVER['HTTP_REFERER']) && !empty($_SERVER['HTTP_REFERER'])){
$http_referer = $_SERVER['HTTP_REFERER'];  // gives the location of the page which  
                                           // directed to the current page
}

function loggedin(){

if (isset($_SESSION['Customer_ID']) && !empty($_SESSION['Customer_ID']) ) {
	return true;
}
else {
	return false;
}
}

function isOrder(){

if (isset($_SESSION['Order_ID']) && !empty($_SESSION['Order_ID']) ) {
  return true;
}
else {
  return false;
}

}


function getuserfield($field,$conn){

	$queryX = "select $field from customers where Customer_ID ='".$_SESSION['Customer_ID']."'";
	$query_runX = mysqli_query($conn,$queryX);
	if ($query_runX)
       {
       	$query_resultX= $query_runX->fetch_assoc()["$field"];// equivalent form
       	                    // return mysql_result($query_run, 0 , $field)
          return $query_resultX;
       }
}




?>