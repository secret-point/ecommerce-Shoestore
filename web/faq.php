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
		<br />
		<br />
	<div class="content">
		<div class="container"
							 <div class="col_1_of_bottom span_1_of_first1">
								    <h2>FREQUENTLY ASKED QUESTIONS</h2>
		<br />
								    <ul class="list3">
										<li style="font-weight: 700">
											Is Shipping free?</li>
									</ul>
                                    <p>
                                        Yes, it is free for anywhere within Pakistan, Terms and conditions may apply for overseas.</p>
                                    <ul class="list3">
                                        <li style="font-weight: 700">
											How do I Pay?</li>
									</ul>
                                    <p>
                                        Payment will be on delivery.</p>
                                    <ul class="list3">
                                        <li style="font-weight: 700">
											What if my address has changed after placing order?</li>
									</ul>
                                    <p>
                                        Contact us at given phone number ASAP.</p>
                                    <ul class="list3">
                                        <li style="font-weight: 700">
											Can I get a refund/return?<span style="color: rgb(85, 85, 85); font-family: Arial, Helvetica, sans-serif; font-size: 12px; font-style: normal; font-variant: normal; font-weight: 700; letter-spacing: normal; line-height: 17.1428px; orphans: auto; text-align: start; text-indent: 0px; text-transform: none; white-space: normal; widows: 1; word-spacing: 0px; -webkit-text-stroke-width: 0px; display: inline !important; float: none; background-color: rgb(255, 255, 255);"><br /></span>
										</li>
									</ul>
							        <p>
                                        No sorry, according to our policy once something is ordered or delivered e don&#39;t refund or return, however size of a shoe can be exchanged and payment will be adjusted accordingly.</p>
							    </div>
								<div class="clearfix"></div>
		</div>
		<br />
		<br />
		<?php require 'footer.php';?>
	</div>
	<!----container---->
	</body>
</html>