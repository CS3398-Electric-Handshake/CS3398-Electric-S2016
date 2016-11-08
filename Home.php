<?php
 ob_start();
 session_start();
 require_once 'DBconnect.php';
 
 // if session is not set this will redirect to login page
 if( !isset($_SESSION['user']) ) {
  header("Location: Index.php");
  exit;
 }
    $logged = $_SESSION['user'];
    echo $logged;
 // select loggedin users detail
    #$res=mysqli_query($conn, "SELECT * FROM user WHERE first_name= $logged");
    #$userRow=mysqli_fetch_array($res) ;
;
;

?>
<!DOCTYPE html>
<html class="no-js">
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
<title>Snoutscout - <?php echo $logged; ?></title>
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
<li><a href="#">Home</a></li>
<li><a href="UserAccountPage.html">Hey, <?php echo $logged; ?></a></li>
<li><a href="Logout.php?logout"><span class="glyphicon glyphicon-log-out"></span>&nbsp;Sign Out</a></li>
</ul>
<ul class="sub-menu">
<li><a href="#">Terms</a></li>
<li><a href="#">Site search</a></li>
</ul>
</nav>
</div>
</header>
<div class="large-banner">
<div class="overlay">
<img class="logo-image" srcset="img/logos/ss_logo.png" alt="" />
</div>
</div>
<div class="text-strip" class="green">
<div class="wrapper">
<blockquote>SnoutScout</blockquote><p><font size="+2"><br/>Get started, are you a cat person or a dog peron?</font></p>
<br />
<br />
<br />
<br />
<a href=""><img src="img/landing page/daisy.jpg" alt="Dog" style="width:500px;height:500px;float:left;"</a>

 <a href=""><img src="img/landing page/leo.jpg" alt="Cat" style="width:500px;height:500px;"> </a>
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
</div>
</div>
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
