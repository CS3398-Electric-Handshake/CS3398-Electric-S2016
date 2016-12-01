<?php
 ob_start();
 session_start();
 if( isset($_SESSION['user'])!="" ){
  header("Location: Home.php");
 }
 include_once 'DBconnect.php';

 $error = false;
 $name = "";
 $email = "";
 $nameError = "";
 $emailError = "";
 $passError = "";

 if ( isset($_POST['btn-signup']) ) {
  
  // clean user inputs to prevent sql injections
  $name = trim($_POST['name']);
  $name = strip_tags($name);
  $name = htmlspecialchars($name);
  
  $email = trim($_POST['email']);
  $email = strip_tags($email);
  $email = htmlspecialchars($email);
  
  $pass = trim($_POST['pass']);
  $pass = strip_tags($pass);
  $pass = htmlspecialchars($pass);
  
  // basic name validation
  if (empty($name)) {
   $error = true;
   $nameError = "Please enter your full name.";
  } else if (strlen($name) < 3) {
   $error = true;
   $nameError = "Name must have atleat 3 characters.";
  } else if (!preg_match("/^[a-zA-Z ]+$/",$name)) {
   $error = true;
   $nameError = "Name must contain alphabets and space.";
  }
  
  //basic email validation
  if ( !filter_var($email,FILTER_VALIDATE_EMAIL) ) {
   $error = true;
   $emailError = "Please enter valid email address.";
  } else {
   // check email exist or not
      
   $query = "SELECT email FROM user WHERE email='$email'";
   $result = mysqli_query($conn, $query) or die(mysqli_error($conn));
   $count = mysqli_num_rows($result);
   if($count!=0){
    $error = true;
    $emailError = "Provided Email is already in use.";
   }
  }
  // password validation
  if (empty($pass)){
   $error = true;
   $passError = "Please enter password.";
  } else if(strlen($pass) < 6) {
   $error = true;
   $passError = "Password must have atleast 6 characters.";
  }
  
  // password encrypt using SHA256();
  $password = $pass;
  
  // if there's no error, continue to signup
  if( !$error ) {
   
   $query = "INSERT INTO user(first_name, email, Password) VALUES('$name','$email','$password')";
   $res = mysqli_query($conn, $query) or die(mysqli_error($conn));
    
   if ($res) {
    $errTyp = "success";
    $errMSG = "Successfully registered, you may <a href='Index.php'>sign in now</a>";
    unset($name);
    unset($email);
    unset($pass);
   } else {
    $errTyp = "danger";
    $errMSG = "Something went wrong, try again later..."; 
   } 
    
  }
  
  
 }
?>



<!DOCTYPE html>
<html class="no-js">
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
<title>Login | Snoutscout</title>
<meta name="description" content="">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="css/homepage.css">
x
<!--[if lt IE 9]>
<script src="js/vendor/modernizr-2.6.2-respond-1.1.0.min.js"></script>
<link rel="stylesheet" href="js/vendor/outdatedBrowser.min.css">
<![endif]-->

<!-- FONTS -->
<!-- add updated script from typekit or google fonts -->
<link href='http://fonts.googleapis.com/css?family=Lato&subset=latin,latin-ext' rel='stylesheet' type='text/css'>


<script>
// Picture element HTML5 shiv
document.createElement( "picture" );
</script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/picturefill/2.3.1/picturefill.min.js" async=""></script>

</head>
<body>
<header>
<div class="wrapper">
<h1>123-456-7890</h1>
<a href="#navigation" class="menu-btn icon-menu"></a>
<nav id="navigation">
<strong>MAIN MENU</strong>
<ul class="menu">
<li><a href="index.html">Home</a></li>
<li><a href="Index.php">Login</a></li>
<li><a href="Register.php">Sign Up!</a></li>
</ul>
<ul class="sub-menu">
<li><a href="#">Terms</a></li>
<li><a href="#">Site search</a></li>
</ul>
</nav>
</div>
</header>

</div>
<div class="text-strip" class="green">
<div class="wrapper">

<div class="container">



<div id="login-form">
<form method="post" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" autocomplete="off">

<div class="col-md-12">

<div class="form-group">
<h2 class=""><font size="8">Sign Up.</font></h2>
</div>
</br>

<div class="form-group">
</div>

<?php
    if ( isset($errMSG) ) {
        
        ?>
<div class="form-group">
<div class="alert alert-<?php echo ($errTyp=="success") ? "success" : $errTyp; ?>">
<span class="glyphicon glyphicon-info-sign"></span> <?php echo $errMSG; ?>
</div>
</div>
<?php
    }
    ?>
<img class="logo-image" srcset="img/logos/ss_logo3.png" alt="" />
<div class="form-group">
<div class="input-group">
<span class="input-group-addon"><span class="glyphicon glyphicon-user"></span></span>
<input type="text" name="name" class="form-control" placeholder="Enter Name" maxlength="50" style="width: 300px; height: 25px;"/>
</div>
<span class="text-danger"><?php echo $nameError; ?></span>
</div>
</br>

<div class="form-group">
<div class="input-group">
<span class="input-group-addon"><span class="glyphicon glyphicon-envelope"></span></span>
<input type="email" name="email" class="form-control" placeholder="Enter Your Email" maxlength="40" style="width: 300px; height: 25px;"/>
</div>
<span class="text-danger"><?php echo $emailError; ?></span>
</div>
</br>

<div class="form-group">
<div class="input-group">
<span class="input-group-addon"><span class="glyphicon glyphicon-lock"></span></span>
<input type="password" name="pass" class="form-control" placeholder="Enter Password" maxlength="15" style="width: 300px; height: 25px;"/>
</div>
<span class="text-danger"><?php echo $passError; ?></span>
</div>
<div class="form-group">
</div>

<div class="form-group">
<button type="submit" class="btn btn-block btn-primary" name="btn-signup">Sign Up</button>
</div>

<div class="form-group">
</div>

<div class="form-group">
<a href="Index.php">Sign in Here...</a>
</div>

</div>

</form>
</div>




</div>

</div>

</div>
</div>

</div>

</div>
<div class="column-strip">
<div class="wrapper">
<div class="column-wrapper">
<div class="column_item">

<h2>Why Adopt?</h2>
<h3>One at a Time</h3>
<p class="match-height" style="height: 120px;">Animals in shelters are required to be medically up to date, and are a lot cheaper than buying from mills or stores.Unfortunately Around 2.7 million dogs and cats within the United States are euthanized every year. You can be one of the few people to help reduce the number of animals that are euthanized from kill shelters.</p>
<a href="##">Read more</a>
</div>
<div class="column_item">
<h2>Why SnoutScout?</h2>
<h3>Easy Access to local Shelters!</h3>
<p class="match-height" style="height: 120px;">With our mission always in mind, we work tirelessly to improve the lives of animals around the world. With our technology, you'll be able to be paired with the perfect match that you have always been waiting for. With us, you can find your best friend from just a single swipe through our catalog of animals in shelters near your location.</p>
<a href="##">Read more</a>

</div>
</div>
<!--[if lt IE 9]>
<div id="outdated">
<h6>Your browser is out-of-date!</h6>
<p>Update your browser to view this website correctly. <a id="btnUpdateBrowser" href="http://outdatedbrowser.com/">Update my browser now </a></p>
<p class="last"><a href="#" id="btnCloseUpdateBrowser" title="Close">&times;</a></p>
</div>
<![endif]-->

<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
<script>window.jQuery || document.write('<script src="js/vendor/jquery-1.11.3.min.js"><\/script>')</script>
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyA8_xfESmwJq39I7U97bfLf1c0xKXzAbX8&callback=initMap" async defer></script>
<!--[if lt IE 9]>
<script src="js/vendor/outdatedBrowser.min.js"></script>
<script>
$( document ).ready(function() {
                    outdatedBrowser({
                                    bgColor: '#187e9b',
                                    color: '#ffffff',
                                    lowerThan: 'boxShadow'
                                    })
                    })
</script>
<![endif]-->

<!-- All JS actions that are site wide should be in this file -->
<script src="js/main.js"></script>
</body>
</html>
<?php ob_end_flush(); ?>
