<?php
    ob_start();
    session_start();
    
    
    $logged = $_SESSION['user'];
    echo $logged;
    
    $gender= "";
    $im="";
    $name="";
    $location="";
    $locationcity="";
    $breed="";
    $_SESSION['choice'] ="dogs";
    $ind="";
    //if (isset($_POST['submit'])) {
      //  if(isset($_POST['radio']))
        //{   $selection = $_POST['radio'];
            require_once 'DBconnect2.php';
            
            //if ($selection == 'dogs'){
                $sql = "SELECT * FROM dogs ORDER BY RAND() LIMIT 19;";
                $mq = mysqli_query($con, $sql) or die (mysqli_error($con));
                while ($col = mysqli_fetch_row($mq)) {
                    $im=$col[1];
                    $name=$col[3];
                    $location=$col['6'];
                    $locationcity=$col['7'];
                    $breed=$col['4'];
                    $_SESSION['ind']=$col['8'];
                }
    //if (isset($_POST['btn'])){
      //  $choice = $_POST['btn'];
        //if ($choice == 'like'){
          //  $file="addindex.php";
            //require $file;
            //}
        //}
    
            //}
       // }
    //}
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
<li><a href="Home.php">Home</a></li>
<li><a href="UserAccountPage.php">Hey, <?php echo $logged; ?></a></li>
<li><a href="Logout.php?logout"><span class="glyphicon glyphicon-log-out"></span>&nbsp;Sign Out</a></li>
</ul>
<ul class="sub-menu">
<li><a href="#">Terms</a></li>
<li><a href="#">Site search</a></li>
</ul>
</nav>
</div>
</header>
</div>
</div>
<div class="text-strip" class="green">
<div class="wrapper">
<img src="img/logos/ss_logo3.png" alt="logo" width= "150 px">
<br/>
<a href = "addindex.php"><img src="img/landing page/heart.png" alt="like" width= "75 px"></a>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
<a href = ""><img src="img/landing page/arrow.png" alt="next" width= "75 px" ></a>
<br />
<img src="<?php echo $im; ?>" alt="pet" width = "400 px" >
<br />
Breed: <?php echo $breed; ?>
<br />
Name: <?php echo $name; ?>
<br />
Lacation: <?php echo $location; ?>, <?php echo $locationcity; ?>, Texas
</div><br />
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
