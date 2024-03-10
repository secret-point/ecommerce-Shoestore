<?php
require 'core.inc.php';
?>
<!DOCTYPE HTML>
<html>
	<head>
		<title>Brnd-logo Website Template | Home :: w3layouts</title>
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
			<?php require 'header.php';?>
			<!--//top-header-nav---->
			<!----start-slider-script---->
			<script src="js/responsiveslides.min.js"></script>
			 <script>
			    // You can also use "$(window).load(function() {"
			    $(function () {
			      // Slideshow 4
			      $("#slider4").responsiveSlides({
			        auto: true,
			        pager: true,
			        nav: true,
			        speed: 500,
			        namespace: "callbacks",
			        before: function () {
			          $('.events').append("<li>before event fired.</li>");
			        },
			        after: function () {
			          $('.events').append("<li>after event fired.</li>");
			        }
			      });
			
			    });
			  </script>
			<!----//End-slider-script---->
			<!-- Slideshow 4 -->
			    <div  id="top" class="callbacks_container">
			      <ul class="rslides" id="slider4">
					<?php
					// Here all the products are printed one by one
					$query140 = "select * from products where category = 'M' limit 8 offset 16";
					$query_run140 = mysqli_query($conn,$query140);
					
					// For each product print a box
					while ( $db_row140 = mysqli_fetch_row($query_run140) )
					{
						// For the current product fetch it's small images
						$query141 = "select * from product_images where Product_ID=" . $db_row140[0] . " limit 9 offset 1";
						$query_run141 = mysqli_query($conn,$query141);
						
						// This is product box
						$db_row141 = mysqli_fetch_row($query_run141);
						echo "<li>";
						echo "<img src=\"$db_row141[1]\">";
						echo "<div class=\"caption\">";
						echo "<div class=\"slide-text-info\">";
						echo "<h1>$db_row140[1]</h1>";
			          	echo "<a class=\"slide-btn\" href=\"view.php?id=$db_row140[0]\"><span>Rs. $db_row140[2]</span> <small>VIEW</small><label> </label></a>";
						echo "</div>";
						echo "</div>";
						echo "</li>";
					}
					?>
			      </ul>
			    </div>
			    <div class="clearfix"> </div>
			<!----- //End-slider---->
			<!----content---->
				<div class="content">
				<!---top-row--->
				<div class="container"> 
				<!----speical-products---->
				<div class="special-products">
					<div class="s-products-head">
						<div class="s-products-head-left">
							<h3>TOP <span>PRODUCTS</span></h3>
						</div>
						<div class="clearfix"> </div>
					</div>
					<!----special-products-grids---->
					<div class="special-products-grids">
					<?php
					
					// Here all the products are printed one by one
					$query111 = "SELECT * FROM Products ORDER BY Ratings DESC limit 8";
					$query_run111 = mysqli_query($conn,$query111);
					
					// For each product print a box
					while ( $db_row111 = mysqli_fetch_row($query_run111) )
					{
						// For the current product fetch it's small images
						$query112 = "SELECT * FROM Product_Images WHERE Product_ID=" . $db_row111[0];
						$query_run112 = mysqli_query($conn,$query112);
						
						// This is product box
						echo "<div class=\"col-md-3 special-products-grid text-center\">";
							$db_row112 = mysqli_fetch_row($query_run112);
							echo "<a class=\"brand-name\" href=\"view.php?id=$db_row111[0]\"><img src=\"" . $db_row112[1] . "\" title=\"name\" /></a>";
							$db_row112 = mysqli_fetch_row($query_run112);
							echo "<a class=\"product-here\" href=\"view.php?id=$db_row111[0]\"><img src=\"" . $db_row112[1] . "\" title=\"product-name\" /></a>";
							echo "<h4><a href=\"view.php?id=$db_row111[0]\">" . $db_row111[1] . "</a></h4>";
							echo "<a class=\"product-btn\" href=\"view.php?id=$db_row111[0]\"><span>Rs. " . $db_row111[2] . "</span><small>VIEW</small><label> </label></a>";
						echo "</div>";
					}
					?>
						<div class="clearfix"> </div>
					</div>
					<!---//special-products-grids---->
				</div>
				<!---//speical-products---->
				</div>
			<!----content---->
			<!----footer--->
			<?php require 'footer.php';?>
		</div>
		<!----container---->
	</body>
</html>

