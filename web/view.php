<?php
require 'connect.inc.php';
require 'core.inc.php';
require 'header.php';


// Get Product_ID specified by URL in GET Request
if (isset($_GET['id']) && !empty($_GET['id']) && $_GET['id'] > 0)
{
	$viewID = $_GET['id'];
}else
{
	header('Location: 404.html');
}

// Check if the product exists
$query1 = "select * from products where Product_ID = $viewID";
$query_run1 = mysqli_query($conn,$query1);
$query_num_rows = mysqli_num_rows($query_run1);
if ($query_num_rows == 0)
{
	// Redirect if the product does not exist
	header('Location: 404.php');
}
// Fetch all information about product
$db_rowA = mysqli_fetch_row($query_run1);


// Fetch Product Big Images
$query2 = "select location from product_images where Product_ID = $viewID limit 999 offset 1";
$query_run2 = mysqli_query($conn,$query2);


// Fetch Product Size Information
$query3 = "select size from product_avail where Product_ID = $viewID";
$query_run3 = mysqli_query($conn,$query3);
?>

<!DOCTYPE HTML>
<html>
	<head>
		<title>Brnd-logo Website Template | Details :: w3layouts</title>
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
		<!----container---->
		
			<!--//top-header-nav---->
			<!----content---->
				<div class="content">
				<div class="clearfix"> </div>
				<!-- //products ---->
				<!----product-details--->
				<div class="product-details">
					<div class="container">
					<div class="product-details-row1">
						<div class="product-details-row1-head">
							<!---- PHP: Product Name is Printed  --->
							<h2><?php echo $db_rowA[1];?></h2>
						</div>
						<div class="col-md-4 product-details-row1-col1">
							<!----details-product-slider--->
						<!-- Include the Etalage files -->
							<link rel="stylesheet" href="css/etalage.css">
							<script src="js/jquery.etalage.min.js"></script>
						<!-- Include the Etalage files -->
						<script>
								jQuery(document).ready(function($){
					
									$('#etalage').etalage({
										thumb_image_width: 300,
										thumb_image_height: 400,
										source_image_width: 900,
										source_image_height: 1000,
										show_hint: true,
										click_callback: function(image_anchor, instance_id){
											alert('Callback example:\nYou clicked on an image with the anchor: "'+image_anchor+'"\n(in Etalage instance: "'+instance_id+'")');
										}
									});
									// This is for the dropdown list example:
									$('.dropdownlist').change(function(){
										etalage_show( $(this).find('option:selected').attr('class') );
									});
		
							});
						</script>
						<!--//details-product-slider-->
						<div class="details-left">
							<div class="details-left-slider">
								<ul id="etalage">
									<?php
									// Large Images of Product
									while ( $db_rowB = mysqli_fetch_row($query_run2) )
									{
										echo "<li>";
										echo "<img class=\"etalage_thumb_image\" src=\"" . $db_rowB[0] . "\" />";
										echo "<img class=\"etalage_source_image\" src=\"" . $db_rowB[0] . "\" />";
										echo "</li>";
									}
									?>
								</ul>
							</div>
						</div>
					</div>
					<div class="col-md-8 product-details-row1-col2">
						<div class="product-price">
							<div class="product-price-left text-right">
								<!---- PHP: Product Price is Printed  -->
								<h5>Rs. <?php echo $db_rowA[2];?></h5>
							</div>
							
							<div class="clearfix"> </div>
						</div>

						<div class="product-price-details">
							<form action="view.php?id=<?php echo $viewID; ?>" method="post">
							<p class="shipping"><span> </span>Free shipping</p>
							<div class="clearfix"> </div>
							<div class="product-size-qty">
								<div class="pro-size"> 
									<span>Size:</span>
									<select name ="size">
									<?php
									// Product Sizes are given according to the product here
									while($db_rowC = mysqli_fetch_row($query_run3))
									{
										echo "<option value =\"$db_rowC[0]\" >" . $db_rowC[0] . "</option>";
									}
									?>
									</select>
								</div>
								<div class="pro-qty">
									<span>Qty:</span>
									<select name = "quantity">
										<option value ="1">1</option>
										<option value ="2">2</option>
										<option value ="3">3</option>
										<option value ="4">4</option>
										<option value ="5">5</option>
									</select>
								</div> 
								<div class="clearfix"> </div>
							</div>
							<div class="clearfix"> </div>
							<div class="product-cart-share">
								<div class="add-cart-btn">
									<input type="submit" value="Add to cart" />
								</div>
							</div>
							</form>
						</div>
					</div>
						<div class="clearfix"> </div>
				<!--//product-details--->
				</div>
				<!---- product-details ---->
				<div class="product-tabs">
					<!--Horizontal Tab-->
				    <div id="horizontalTab">
				        <ul>
				            <li><a href="#tab-1">Product overview</a></li>
				        </ul>
				        <div id="tab-1" class="product-complete-info">
				        	<h3>DESCRIPTION:</h3>
							<div class="product-fea">
							<!---- PHP: Product Description is Printed  --->
				       		<p><?php echo $db_rowA[4];?></p>
				       		</div>
				        </div>
				    </div>
				    <!-- Responsive Tabs JS -->
				    <script src="js/jquery.responsiveTabs.js" type="text/javascript"></script>
				
				    <script type="text/javascript">
				        $(document).ready(function () {
				            $('#horizontalTab').responsiveTabs({
				                rotate: false,
				                startCollapsed: 'accordion',
				                collapsible: 'accordion',
				                setHash: true,
				                disabled: [3,4],
				                activate: function(e, tab) {
				                    $('.info').html('Tab <strong>' + tab.id + '</strong> activated!');
				                }
				            });
				
				            $('#start-rotation').on('click', function() {
				                $('#horizontalTab').responsiveTabs('active');
				            });
				            $('#stop-rotation').on('click', function() {
				                $('#horizontalTab').responsiveTabs('stopRotation');
				            });
				            $('#start-rotation').on('click', function() {
				                $('#horizontalTab').responsiveTabs('active');
				            });
				            $('.select-tab').on('click', function() {
				                $('#horizontalTab').responsiveTabs('activate', $(this).val());
				            });
				
				        });
				    </script>
				</div>
				<!-- //product-details ---->
				</div>
				</div>
			<!----content---->
			<div class="clearfix"> </div>
			<?php require 'footer.php';?>
		</div>
		<!----container---->
	</body>
</html>