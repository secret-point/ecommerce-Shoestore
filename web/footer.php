<?php
$thisPageName = basename($_SERVER["PHP_SELF"]);
if($thisPageName == 'footer.php')
{
	header('Location: index.php');
}
?>
		<!----footer--->
		<div class="footer">
			<div class="container">
				<div class="col-md-3 footer-logo">
					<a href="index.php"><img src="images/flogo.png" title="brand-logo" /></a>
				</div>
				<div class="col-md-7 footer-links">
					<ul class="unstyled-list list-inline">
						<li><a href="faq.php"> Faq</a> <span> </span></li>
						<li><a href="terms.php"> Terms and Conditions</a> <span> </span></li>
						<li><a href="aboutus.php"> About Us</a> </li>
						<div class="clearfix"> </div>
					</ul>
				</div>
				<div class="clearfix"> </div>
			</div>
		</div>
		<div class="clearfix"> </div>
		<!---//footer--->
		<!---copy-right--->
		<div class="copy-right">
			<div class="container">
				<p>Template by <a href="http://w3layouts.com/">W3layouts</a></p>
							<script type="text/javascript">
									$(document).ready(function() {
										/*
										var defaults = {
								  			containerID: 'toTop', // fading element id
											containerHoverID: 'toTopHover', // fading element hover id
											scrollSpeed: 1200,
											easingType: 'linear' 
								 		};
										*/
										
										$().UItoTop({ easingType: 'easeOutQuart' });
										
									});
								</script>
				<a href="#" id="toTop" style="display: block;"> <span id="toTopHover" style="opacity: 1;"> </span></a>
			</div>
		</div>
		<!--//copy-right--->