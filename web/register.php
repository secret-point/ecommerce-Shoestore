<?php
require 'core.inc.php';
require 'connect.inc.php';

	require 'header.php';
if (!loggedin()) {
    
  
  if (isset($_POST['username']) &&
     isset($_POST['password']) &&
     isset($_POST['password_again']) &&
     isset($_POST['firstname']) &&
     isset($_POST['lastname'])  &&
     isset($_POST['phone_number']) &&
     isset($_POST['email']) &&
     isset($_POST['address']) &&
     isset($_POST['gender']) &&
     isset($_POST['birthdate_day']) && 
     isset($_POST['birthdate_month']) &&
     isset($_POST['birthdate_year'])   
     )
  {
    
    $username = $_POST['username'];
    $password = $_POST['password'];
    $password_again=$_POST['password_again'];
    $firstname=$_POST['firstname'];
    $lastname=$_POST['lastname'];
    $phone_number=$_POST['phone_number'];
    $email=$_POST['email'];
    $address=$_POST['address'];
    $gender=$_POST['gender'];
    
    $birthdate=$_POST['birthdate_year']."-".$_POST['birthdate_month']."-".$_POST['birthdate_day'];
  
  if ( !empty($username) &&  !empty($password) && !empty($password_again) && !empty($firstname) && !empty($lastname) && !empty($phone_number) && !empty($email) && !empty($address) && !empty($gender) && !empty($birthdate)){
    
      if ($password!=$password_again){
           echo "Passwords do not match.";
         }

      else {
              
         $query ="SELECT username from customers where Username = '$username'";
         $query_run=mysqli_query($conn,$query);
         $query_num_rows = mysqli_num_rows($query_run);
         if ($query_num_rows==1) {
             echo "The username '$username' already exists. ";
         } else {


         	$query = "INSERT into customers values ('','$firstname','$lastname','$email','$phone_number','$address','$birthdate','$gender','$username','$password')";

         
             
              $query_run=mysqli_query($conn,$query);
              if ($query_run){
                header('Location: index.php');
              }
              else {
                echo "Sorry, We couldn't register you at the moment. Please try again later. ";
              }


         }

         }



  }
else {
   echo "<br> *All fields are required.";
}


  }
  else {
    echo "<br>  *All fields are required.";
}

?>







<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
    <head>
        <title>Registration Form</title>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
        <link rel="stylesheet" type="text/css" href="css/default.css"/>
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
		
    </head>
    <body>    
        <form action="register.php" class="register" method="post">
            <h1>Registration</h1>
            <fieldset class="row1">
                <legend>Account Details
                </legend>
                <p>
                    <label>Username *
                    </label>
                    <input type="text" name="username" value="<?php if(isset($username) && $username != 'root')  { echo "$username" ;}  ?>" />
                    
                </p>
                <p>
                    <label>Password*
                    </label>
                    <input type="password" name="password" />
                    <label>Repeat Password*
                    </label>
                    <input type="password" name="password_again"/>
                    <label class="obinfo">* obligatory fields
                    </label>
                </p>
            </fieldset>
            <fieldset class="row2">
                <legend>Personal Details
                </legend>
                <p>
                    <label>First Name*
                    </label>
                    <input type="text" class="long" name="firstname" value="<?php if(isset($firstname))  {   echo "$firstname";}?>"/>
                </p>
                <p>
                    <label>Last Name *
                    </label>
                    <input type="text" name="lastname" value="<?php if(isset($lastname))  {    echo "$lastname";}?>" />
                </p>
               
                <p>
                    <label>Phone Number *
                    </label>
                    <input type="text" class="long" name="phone_number" value="<?php if(isset($lastname))  {    echo "$phone_number";}?>"/>
                </p>
               
                <p>
                    <label>Email
                    *
                    </label>
                    <input class="long" type="text" name="email" value="<?php if(isset($email))  {    echo "$email";}?>" >

                </p>
                <p>
                    <label>Address *
                    </label>
                    <input class="long" type="text"  name="address" value="<?php if(isset($address))  {    echo "$address";}?>">

                </p>
            </fieldset>
            <fieldset class="row3">
                <legend>Further Information
                </legend>
                <p>
                    <label>Gender *</label>
                    <input type="radio" value="m" name="gender" checked="checked"/>
                    <label class="gender">Male</label>
                    <input type="radio" value="f"  name="gender"/>
                    <label class="gender">Female</label>
                </p>
                <p>
                    <label>Birthdate *
                    </label>
                    <select class="date" name="birthdate_day">
                        <option value="01">01
                        </option>
                        <option value="02">02
                        </option>
                        <option value="03">03
                        </option>
                        <option value="04">04
                        </option>
                        <option value="05">05
                        </option>
                        <option value="06">06
                        </option>
                        <option value="07">07
                        </option>
                        <option value="08">08
                        </option>
                        <option value="09">09
                        </option>
                        <option value="10">10
                        </option>
                        <option value="11">11
                        </option>
                        <option value="12">12
                        </option>
                        <option value="13">13
                        </option>
                        <option value="14">14
                        </option>
                        <option value="15">15
                        </option>
                        <option value="16">16
                        </option>
                        <option value="17">17
                        </option>
                        <option value="18">18
                        </option>
                        <option value="19">19
                        </option>
                        <option value="20">20
                        </option>
                        <option value="21">21
                        </option>
                        <option value="22">22
                        </option>
                        <option value="23">23
                        </option>
                        <option value="24">24
                        </option>
                        <option value="25">25
                        </option>
                        <option value="26">26
                        </option>
                        <option value="27">27
                        </option>
                        <option value="28">28
                        </option>
                        <option value="29">29
                        </option>
                        <option value="30">30
                        </option>
                        <option value="31">31
                        </option>
                    </select>
                    <select  name="birthdate_month">
                        <option value="01">January
                        </option>
                        <option value="02">February
                        </option>
                        <option value="03">March
                        </option>
                        <option value="04">April
                        </option>
                        <option value="05">May
                        </option>
                        <option value="06">June
                        </option>
                        <option value="07">July
                        </option>
                        <option value="08">August
                        </option>
                        <option value="09">September
                        </option>
                        <option value="10">October
                        </option>
                        <option value="11">November
                        </option>
                        <option value="12">December
                        </option>
                    </select>
                    <input class="year" type="text" size="4" maxlength="4"  name="birthdate_year"/>e.g 1995
                </p>
               
                
                <div class="infobox"><h4>Helpful Information</h4>
                    <p>Please enter correct information in all fields to get the best out of our services. We regard your compliance.</p>
                </div>
            </fieldset><fieldset class="row4">
            </fieldset>
            <div><button class="button">Register &raquo;</button></div>
        </form>
    </body>
</html>






















<?php

}
else if (loggedin())  
 {
    echo 'Youre already registered and logged  in.';
}

require 'footer.php';
  ?>


