<?php
$thisPageName = basename($_SERVER["PHP_SELF"]);
if($thisPageName == 'header.php')
{
	header('Location: index.php');
}
require 'connect.inc.php';
?>
<!----container---->
		<div class="container">
			<div class="top-header">
				<div class="logo">
					<a href="index.php"><img src="images/logo.png" title="barndlogo" /></a>
				</div>
				<div class="top-header-info">
					<div class="top-contact-info">
						<ul class="unstyled-list list-inline">
							<li><span class="phone"> </span>+92 938 281026</li>
							<li><span class="mail"> </span><a href="mailto:info@gmail.com">info@gmail.com</a></li>
							<div class="clearfix"> </div>
						</ul>
					</div>
					<div class="cart-details">
						<div class="login-rigister">
							<ul class="unstyled-list list-inline">
							<?php
							
							   if (!loggedin()){
							
						     echo "	<li><a class=\"login\" href=\"login.php\">Login</a></li>
								<li><a class=\"rigister\" href=\"register.php\">REGISTER <span> </span></a></li> ";
								}
							
                                 else {
                                                                    
                                  echo "<li style=\"color:blue;\">"."Welcome, " .getuserfield("First_Name",$conn)." ".getuserfield("Last_Name",$conn)."</li>";
                                  echo  "<li><a class=\"rigister\" href=\"logout.php\">LOGOUT <span> </span></a></li> ";

                                 }
								?>

								<div class="clearfix"> </div>
							</ul>
						</div>
						<div class="clearfix"> </div>
					</div>
				</div>
				<div class="clearfix"> </div>
			</div>
			<!----//top-header---->
			<!---top-header-nav---->
			<div class="top-header-nav"> 
			<!----start-top-nav---->
			 <nav class="top-nav main-menu">
					<ul class="top-nav">
						<li><a href="index.php">HOME </a><span> </span></li>
						<li><a href="men.php">MEN</a><span> </span></li>
						<li><a href="women.php">WOMEN</a><span> </span></li>
						<li><a href="kids.php">KIDS</a><span> </span></li>
						<li><a href="aboutus.php">ABOUT US</a></li>
						<li></li>
						<div class="clearfix"> </div>
					</ul>
					<a href="#" id="pull"><img src="images/nav-icon.png" title="menu" /></a>
			  </nav>
			  <!----End-top-nav---->
			  <!---top-header-search-box--->
			  <div class="top-header-search-box">
				<?php require 'mini_cart.php'; ?>
			  </div>
			  <!---top-header-search-box--->
						<div class="clearfix"> </div>
			</div>
		</div>
		<!----container---->