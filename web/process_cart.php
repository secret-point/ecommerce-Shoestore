<?php
require 'connect.inc.php';
require 'core.inc.php';

if (isset($http_referer) && $http_referer='cart.php')
{
	$o_id=$_SESSION['Order_ID'];
	if (isset($_GET['aa']))
	{
		$query88 = "UPDATE orders SET STATUS ='y', Order_Date = SYSDATE(), Delivery_Date=DATE_ADD(SYSDATE(),INTERVAL 4 DAY) WHERE Order_ID = '$o_id';";
		$query_run88=mysqli_query($conn,$query88);
		
		if ($query_run88)
		{
			$query89 = "SELECT * from cart where Order_ID = $o_id";
			$query_run89=mysqli_query($conn,$query89);
			while($db_row89 = mysqli_fetch_row($query_run89))
			{
				$temp_pid = $db_row89[1];
				$temp_psize = $db_row89[2];
				$temp_pqua = $db_row89[3];
				
				$query90 = "SELECT Quantity from Product_Avail where Product_ID = '$temp_pid' && Size = '$temp_psize'";
				$query_run90=mysqli_query($conn,$query90);
				$db_row90 = mysqli_fetch_row($query_run90);
				
				$new_qua = $db_row90[0] - $temp_pqua;
				
				$query91 = "UPDATE Product_Avail SET Quantity = '$new_qua' where Product_ID = '$temp_pid' && Size = '$temp_psize'";
				$query_run91=mysqli_query($conn,$query91);
				
				
				
				$query93 = "SELECT Ratings from Products where Product_ID = '$temp_pid'";
				$query_run93=mysqli_query($conn,$query93);
				$db_row93 = mysqli_fetch_row($query_run93);
				
				$ratings = $db_row93[0] + $temp_pqua;
				
				$query94 = "UPDATE Products SET Ratings = '$ratings' where Product_ID = '$temp_pid'";
				$query_run94=mysqli_query($conn,$query94);
			}
			
			unset($_SESSION['Order_ID']);
			header('Location: index.php');
		}
		else
		{
			echo "ERROR";
		}
	}
	else
	{
		if(isset($_GET['pid']) && isset($_GET['psize']))
		{
			$pid = $_GET['pid'];
			$psize = $_GET['psize'];
			
			$query92 = "DELETE FROM cart WHERE Order_ID = '$o_id' && Product_ID = '$pid' && Size = '$psize'";
			$query_run92=mysqli_query($conn,$query92);
			
			header('Location: cart.php');
		}
	}
}
else
{
	header('Location: index.php');
}							
?>