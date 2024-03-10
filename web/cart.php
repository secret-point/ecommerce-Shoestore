<?php
require 'connect.inc.php';
require 'core.inc.php';

if (!loggedin())
{
	header('Location: index.php');
}

$total_items = 0;
				
$o_id=$_SESSION['Order_ID'];
$query76 = "SELECT * from cart where Order_ID = $o_id";
$query_run76=mysqli_query($conn,$query76);
$total_items = mysqli_num_rows($query_run76);

if ($total_items == 0)
{
	header('Location: index.php');
}
?>
<!DOCTYPE HTML>
<html>
	<head>
		<title>Brnd-logo Website Template | Products :: w3layouts</title>
		<link href="css/bootstrap.css" rel='stylesheet' type='text/css' />
		<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
		<script src="js/jquery.min.js"></script>
		 <!-- Custom Theme files -->
		<link href="css/style.css" rel='stylesheet' type='text/css' />
   		 <!-- Custom Theme files -->
   		 <!---- start-smoth-scrolling---->
		<script type="text/javascript" src="js/move-top.js"></script>
		<script type="text/javascript" src="js/easing.js"></script>
		<script type="text/javascript">
			jQuery(document).ready(function($) {
				$(".scroll").click(function(event){		
					event.preventDefault();
					$('html,body').animate({scrollTop:$(this.hash).offset().top},1000);
				});
			});
		</script>
		 <!---- start-smoth-scrolling---->
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
		</script>
		<!----webfonts--->
		<link href='http://fonts.googleapis.com/css?family=Lato:100,300,400,700,900,100italic,300italic,400italic,700italic,900italic' rel='stylesheet' type='text/css'>
		<!---//webfonts--->
		<!----start-top-nav-script---->
		<script>
			$(function() {
				var pull 		= $('#pull');
					menu 		= $('nav ul');
					menuHeight	= menu.height();
				$(pull).on('click', function(e) {
					e.preventDefault();
					menu.slideToggle();
				});
				$(window).resize(function(){
	        		var w = $(window).width();
	        		if(w > 320 && menu.is(':hidden')) {
	        			menu.removeAttr('style');
	        		}
	    		});
			});
		</script>
		<!----//End-top-nav-script---->
		
		
		<!----start-cart-script---->
		<link href="css/style_big_cart.css" rel="stylesheet" type="text/css" media="all"/>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8" /> 
		<meta name="keywords" content="Flash Registration Form  Responsive, Login form web template, Sign up Web Templates, Flat Web Templates, Login signup Responsive web template, Smartphone Compatible web template, free webdesigns for Nokia, Samsung, LG, SonyEricsson, Motorola web design" />
		<!--web-fonts-->
		<link href='//fonts.googleapis.com/css?family=Open+Sans:400,300,300italic,400italic,600,600italic,700,700italic,800,800italic' rel='stylesheet' type='text/css'></head>
		<link href='//fonts.googleapis.com/css?family=Montserrat:400,700' rel='stylesheet' type='text/css'>
		<link href='//fonts.googleapis.com/css?family=Yanone+Kaffeesatz:400,700,300,200' rel='stylesheet' type='text/css'>
		<script src="js/jquery_big_cart.min.js"></script>
		<script>$(document).ready(function(c) {
			$('.close').on('click', function(c){
				$('.product-section').fadeOut('slow', function(c){
					$('.product-section').remove();
				});
			});	  
		});
		</script>
		<script>$(document).ready(function(c) {
			$('.close1').on('click', function(c){
				$('.product1').fadeOut('slow', function(c){
					$('.product1').remove();
				});
			});	  
		});
		</script>
		<script>$(document).ready(function(c) {
			$('.close2').on('click', function(c){
				$('.product2').fadeOut('slow', function(c){
					$('.product2').remove();
				});
			});	  
		});
		</script>
		<!----//End-cart-script---->
	</head>
	<body>
		<?php require 'header.php';?>
		<!---header--->
		<div class="header">
			<h1>Products In Cart</h1>
		</div>
		<!---header--->
		<!---main--->
		<div class="main">
			<div class="main-section">
				<?php
				$total_price = 0;
				while( $db_row76 = mysqli_fetch_row($query_run76))
				{
					$temp_pid = $db_row76[1];
									
					$query77 = "SELECT Name,Price from products where Product_ID = $temp_pid";
					$query_run77=mysqli_query($conn,$query77);
					$db_row77 = mysqli_fetch_row($query_run77);
					
					$total_price = $total_price + ($db_row77[1] * $db_row76[3]);
					
					$query78 = "SELECT location from product_images where Product_ID = $temp_pid limit 1 offset 1";
					$query_run78=mysqli_query($conn,$query78);
					$db_row78 = mysqli_fetch_row($query_run78);
									
									
				echo "<div class=\"product1\">";
					echo "<div class=\"product-top\">";
						echo "<div class=\"product-left\">";
							echo "<a href=\"view.php?id=$temp_pid\"><img src=\"$db_row78[0]\"></a>";
						echo "</div>";
						echo "<div class=\"product-right\">";
							echo "<a href=\"view.php?id=$temp_pid\"><h2>$db_row77[0]</h2></a>";
							echo "<ul class=\"size\">";
								echo "<li>Size $db_row76[2]</li>";
								echo "<li>Qty $db_row76[3]</li>";
							echo "</ul>";
						echo "</div>";
					echo "</div>";
					echo "<div class=\"product-right1\">";
						echo "<p>Rs. ". $db_row77[1]*$db_row76[3] ."<p>";
						//echo "<div class=\"close_1\"> </div>";
						echo "<a href=\"process_cart.php?pid=$temp_pid&psize=$db_row76[2]\"><img src=\"images/close_big_cart.png\" /></a>";
					echo "</div>";
					echo "<div class=\"clear\"></div>";
				echo "</div>";
				
				}
				
				
				?>
				
				<div class="product-bottom">
					<h3>Total Price : <span> Rs. <?php echo $total_price;?></h3>
					<br />
					<div class="product-cart-share">
								<div class="add-cart-btn">
									 
									 <form action = "process_cart.php" method ="get">
									 <input type="submit" value="Checkout" name = "aa" /> </form>

								</div>
							</div>
					<div class="clear"></div>
					<br />
				</div>
			</div>
		</div>
		<!---main--->
		<!----content---->
		<div class="clearfix"> </div>
		<?php require 'footer.php';?>
	</body>
</html>

