<?php
$thisPageName = basename($_SERVER["PHP_SELF"]);
if($thisPageName == 'mini_cart.php')
{
	header('Location: index.php');
}

if (loggedin())
{
	if (!isOrder())
	{
		$cus_id = $_SESSION['Customer_ID'];
		
		$query = "SELECT Order_ID FROM orders WHERE Customer_ID=$cus_id && status='n'";
		$query_run=mysqli_query($conn,$query);
		$query_rows = mysqli_num_rows($query_run);
		if ($query_rows > 0)
		{
			$db_row = mysqli_fetch_row($query_run);
		}
		else
		{
			$query = "INSERT into orders values ('','$cus_id','n','0',NULL,NULL)";
			$query_run=mysqli_query($conn,$query);
			
			$query = "SELECT Order_ID from orders order by Order_ID desc limit 1";
			$query_run=mysqli_query($conn,$query);
			
			$db_row = mysqli_fetch_row($query_run);
		}
		
		$_SESSION['Order_ID'] = $db_row[0];
	}
	
	$o_id=$_SESSION['Order_ID'];
	
	if ( isset($_POST['size']) && isset($_POST['quantity']) && isset($_GET['id']) && $thisPageName=='view.php' )
	{
		$o_size= $_POST['size'];
		$o_qua=$_POST['quantity'];
		$o_pid=$_GET['id'];
		
		$query = "SELECT Quantity FROM Product_Avail WHERE Product_ID = $o_pid && Size = '$o_size'";
		$query_run=mysqli_query($conn,$query);
		$db_row = mysqli_fetch_row($query_run);
		$avail_qua = $db_row[0];
		
		if (!($o_qua > $avail_qua))
		{
			$query = "INSERT INTO cart VALUES ('$o_id','$o_pid','$o_size','$o_qua')";
			$query_run=mysqli_query($conn,$query);
		}
	}
}
?>





<!DOCTYPE HTML>
<html>
<head>
<title>Flat Mini Cart Flat Responsive Widget Template :: w3layouts</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="keywords" content="Flat Mini Cart Widget Responsive, Login form web template,Flat Pricing tables,Flat Drop downs  Sign up Web Templates, Flat Web Templates, Login signup Responsive web template, Smartphgraph Compatible web template, free webdesigns for Nokia, Samsung, LG, SonyErricsson, Motorola web design" />
<script type="applijewelleryion/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
<!-- Custom Theme files -->
<link href="css/style_cart.css" rel='stylesheet' type='text/css' />	
<!-- Custom Theme files -->
<link href='//fonts.googleapis.com/css?family=Montserrat:400,700' rel='stylesheet' type='text/css'>
<!-- Custom Theme files -->
<script type="text/javascript" src="js/jquery-1.11.1.min_cart.js"></script>
<script>$(document).ready(function(c) {
	$('.alert-close').on('click', function(c){
		$('.message').fadeOut('slow', function(c){
	  		$('.message').remove();
		});
	});	  
});
</script>
<script>$(document).ready(function(c) {
	$('.alert-close1').on('click', function(c){
		$('.message1').fadeOut('slow', function(c){
	  		$('.message1').remove();
		});
	});	  
});
</script>
<script>$(document).ready(function(c) {
	$('.alert-close2').on('click', function(c){
		$('.message2').fadeOut('slow', function(c){
	  		$('.message2').remove();
		});
	});	  
});
</script>


</head>
<body>
<!--main-->
   		<div class="mini-cart">
	        <?php
		    if (loggedin())
		    {
				$total_price = 0;
				$total_items = 0;
				
				if (isOrder()){
					$o_id=$_SESSION['Order_ID'];
					$query = "SELECT * from cart where Order_ID = $o_id";
					$query_run=mysqli_query($conn,$query);
					$total_items = mysqli_num_rows($query_run);
				}
				
			    echo "<ul class=\"icon1 sub-icon1 profile_img\">";
					echo "<li><a class=\"active-icon c1\" href=\"";if($total_items>0){echo "cart.php";}else{echo "#";}echo"\"><img src=\"images/cart.png\" alt=\"\"/> My Cart </a><div class=\"rate\">". $total_items ."</div>";
						echo "<ul class=\"sub-icon1 list\">";
							echo "<h3>Added Items(". $total_items .")</h3>";
							echo "<div class=\"shopping_cart\">";
							
							if (isOrder()){
								while( $db_row = mysqli_fetch_row($query_run) ){
									
									$temp_pid = $db_row[1];
									
									$query1 = "SELECT Name,Price from products where Product_ID = $temp_pid";
									$query_run1=mysqli_query($conn,$query1);
									$db_row1 = mysqli_fetch_row($query_run1);
									
									$total_price = $total_price + ($db_row1[1] * $db_row[3]);
									
									$query2 = "SELECT location from product_images where Product_ID = $temp_pid limit 1 offset 1";
									$query_run2=mysqli_query($conn,$query2);
									$db_row2 = mysqli_fetch_row($query_run2);
									
									echo "<div class=\"cart_box\">";
										echo "<div class=\"message\">";
											echo "<div class=\"list_img\"><a href=\"view.php?id=$temp_pid\"><img src=\"". $db_row2[0] ."\" class=\"img-responsive\" alt=\"\"/></a></div>";
											echo "<div class=\"list_desc\"><h4><a href=\"view.php?id=$temp_pid\">". $db_row1[0] ."</a></h4>". $db_row[3] ." x ". $db_row[2] ." x <span class=\"actual\">". $db_row1[1] ."</span></div>";
											echo "<div class=\"clear\"></div>";
										echo "</div>";
									echo "</div>";
								}
								$query = "UPDATE orders SET Price = $total_price WHERE Order_ID = $o_id";
								$query_run=mysqli_query($conn,$query);
	                        }
							
	                        echo "</div>";
	                        echo "<div class=\"total\">";
	                        	echo "<div class=\"total_left\">Cart Total : </div>";
	                        	echo "<div class=\"total_right\">Rs. ". $total_price ."</div>";
	                        	echo "<div class=\"clear\"> </div>";
	                        echo "</div>";
                            echo "<div class=\"login_buttons\">";
							
							echo "<center><div class=\"check_button\"><a href=\"";if($total_items>0){echo "cart.php";}else{echo "#";}echo"\">View Cart</a></div></center>";
							  
						    echo "</div>";
					      echo "<div class=\"clear\"></div>";
						echo "</ul>";
					 echo "</li>";
		      echo "</ul>";
              echo "<div class=\"clear\"></div>";
			}
			?>
        </div>
</body>
</html>