<?php
require 'connect.inc.php';
require 'core.inc.php';
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
			<!----speical-products---->
			<div class="special-products all-poroducts">
				<div class="s-products-head">
					<div class="s-products-head-left">
						<h3>ERROR: 404</h3>
					</div>
					<div class="clearfix"> </div>
				</div>
				<!----special-products-grids---->
				<div class="special-products-grids">
					<center><p>Page Not Found</p></center>
					<div class="clearfix"> </div>
				</div>
				<!---//special-products-grids---->
			</div>
			<!---//speical-products---->
		</div>
		<?php require 'footer.php';?>
	</div>
	<!----container---->
	</body>
</html>