<?php 
require 'connect.inc.php';
require 'core.inc.php';


$query_num_rows=-1;
if (loggedin())
{
	header('Location: index.php');
}

else {

if (isset($_POST["Username"]) && isset($_POST["Password"])){

	$Username=$_POST["Username"];
	$Password=$_POST["Password"];
}

if (!empty($Username) && !empty($Password)){
 
 $query = "select Customer_ID from customers where Username='$Username' AND Password='$Password'";
 $query_run = mysqli_query($conn,$query);
 if ($query_run)
 {
  $query_num_rows = mysqli_num_rows($query_run);
  
   if ($query_num_rows==1){
  	$user_id = $query_run->fetch_assoc()['Customer_ID'];
  	$username = $query_run->fetch_assoc()['Username'];
  	$password = $query_run->fetch_assoc()['Password'];
  	$firstname = $query_run->fetch_assoc()['First_Name'];
  	$lastname = $query_run->fetch_assoc()['Last_Name'];



  	$_SESSION['Customer_ID']=$user_id;
  	$_SESSION['Username']= $username;
  	$_SESSION['Password']= $password;
  	$_SESSION['First_Name']= $firstname;
  	$_SESSION['Last_Name']= $lastname;
  	header('Location: index.php');  // redirects the page to index.php
  }

 }


}

}

 ?>
 
<!DOCTYPE HTML>
<html>
	<head>
		<title>Brnd-logo Website Template | Products :: w3layouts</title>
		<link rel="stylesheet" href="css/style2.css">
		<link href="css/bootstrap.css" rel='stylesheet' type='text/css' />
		<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
		<script src="js/jquery.min.js"></script>
		 <!-- Custom Theme files -->
		<link href="css/style.css" rel='stylesheet' type='text/css' />
   		 <!-- Custom Theme files -->
		 
		
		<script src="js/index2.js"></script>
		 
		 
		 
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
		<div class="login-container">
			<section id="content">
				<form action="<?php echo $_SERVER['SCRIPT_NAME'];?>" method="post">
					<h1>Login Form</h1>
					<div>
						<input type="text" placeholder="Username" name="Username" />
					</div>
					<div>
						<input type="password" placeholder="Password" name="Password" />
					</div>
					<?php
					if ($query_num_rows==0)
					{
						echo "Username and Password do not match.";
					}
					?>
					<div>
						<input type="submit" value="Log in" />
					</div>
				</form>
			<!-- button -->
			</section><!-- content -->
		</div>
		<?php require 'footer.php';?>
	</div>
	<!----container---->
	</body>
</html>