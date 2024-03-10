<?php
require 'core.inc.php';

session_destroy(); // unsets all sessions variables

if (isset($http_referer))
{
	header("Location: $http_referer");
}
else
{
	header("Location: index.php");
}
?>