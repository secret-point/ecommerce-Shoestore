<?php
require 'connect.inc.php';
require 'core.inc.php';


// Get Page Number specified by URL in GET Request
if (isset($_GET['page']) && $_GET['page'] > 0) {
	$pageNo = $_GET['page'];
}else{
	$pageNo = 1;
}

// Calculate the page offset according to the page number
$offsetNo = ($pageNo - 1) * 8;
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
	</head>
	<body>
		<!----content---->
		<?php require 'header.php';?>
		<div class="content">
			<div class="container">
				<!--- products ---->
                <!---
				<div class="clearfix"> </div>
                ---->
				
                <!-- //products ---->
				<!----speical-products---->
				<div class="special-products all-poroducts">
					<div class="s-products-head">
						<div class="s-products-head-left">
							<h3>WOMEN</h3>
						</div>
						<div class="clearfix"> </div>
					</div>
					<!----special-products-grids---->
					<div class="special-products-grids">
					<?php
					
					// Here all the products are printed one by one
					$query1 = "select * from products where category = 'W' limit 8 offset " . $offsetNo;
					$query_run1 = mysqli_query($conn,$query1);
					
					// For each product print a box
					while ( $db_rowA = mysqli_fetch_row($query_run1) )
					{
						// For the current product fetch it's small images
						$query2 = "select * from product_images where Product_ID=" . $db_rowA[0];
						$query_run2 = mysqli_query($conn,$query2);
						
						// This is product box
						echo "<div class=\"col-md-3 special-products-grid text-center\">";
							$db_rowB = mysqli_fetch_row($query_run2);
							echo "<a class=\"brand-name\" href=\"view.php?id=$db_rowA[0]\"><img src=\"" . $db_rowB[1] . "\" title=\"name\" /></a>";
							$db_rowB = mysqli_fetch_row($query_run2);
							echo "<a class=\"product-here\" href=\"view.php?id=$db_rowA[0]\"><img src=\"" . $db_rowB[1] . "\" title=\"product-name\" /></a>";
							echo "<h4><a href=\"view.php?id=$db_rowA[0]\">" . $db_rowA[1] . "</a></h4>";
							echo "<a class=\"product-btn\" href=\"view.php?id=$db_rowA[0]\"><span>Rs. " . $db_rowA[2] . "</span><small>VIEW</small><label> </label></a>";
						echo "</div>";
					}
					?>
						<div class="clearfix"> </div>
					</div>
					<!---//special-products-grids---->
				</div>
				<!----->

				<!---//speical-products---->
				</div>
				<div class="container">
				<center>
					<ul class="pagination">
						<!---- PHP: Here the Page Number Button is Highlighted according to the current page number  --->
						<li <?php if($pageNo == 1)echo "class=\"active\""?>><a href="?page=1">1</a></li>
						<li <?php if($pageNo == 2)echo "class=\"active\""?>><a href="?page=2">2</a></li>
						<li <?php if($pageNo == 3)echo "class=\"active\""?>><a href="?page=3">3</a></li>
						<li <?php if($pageNo == 4)echo "class=\"active\""?>><a href="?page=4">4</a></li>
						<li <?php if($pageNo == 5)echo "class=\"active\""?>><a href="?page=5">5</a></li>
					</ul>
				</center>
				</div>
			<!----content---->
			<?php require 'footer.php';?>
		</div>
		<!----container---->
	</body>
</html>

