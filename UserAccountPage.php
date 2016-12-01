<?php
    session_start();
    $logged = $_SESSION['user'];
    $ID = $_SESSION['email'];
    require_once 'DBconnect.php';
    require_once 'DBconnect2.php';
    $que= "SELECT LikedDog1, LikedDog2, LikedDog3, LikedCat1, LikedCat2, LikedCat3 FROM user WHERE email= '$ID';";
    $sqli = mysqli_query($conn, $que)or die(mysqli_error($conn));
    if ($result = mysqli_fetch_array($sqli)){
        require_once 'DBconnect.php';
        $liked=$result['LikedDog1'];
        $qu= "SELECT * FROM dogs Where ind= '$liked';";
        $sql = mysqli_query($con, $qu)or die(mysqli_error($con));
        if ($res= mysqli_fetch_array($sql)){
            $durl1=$res['url'];
            $dname1=$res['Petname'];
        }
        $liked=$result['LikedDog2'];
        $qu= "SELECT Petname, url FROM dogs WHERE ind= '$liked';";
        $sql = mysqli_query($con, $qu)or die(mysqli_error($con));
        if ($res =mysqli_fetch_array($sql)){
            $durl2=$res['url'];
            $dname2=$res['Petname'];
        }
        $liked=$result['LikedDog3'];
        $qu= "SELECT Petname, url FROM dogs WHERE ind= '$liked';";
        $sql = mysqli_query($con, $qu)or die(mysqli_error($con));
        if ($res =mysqli_fetch_array($sql)){
            $durl3=$res['url'];
            $dname3=$res['Petname'];
        }
        $liked=$result['LikedCat1'];
        $qu= "SELECT * FROM cats Where ind= '$liked';";
        $sql = mysqli_query($con, $qu)or die(mysqli_error($con));
        if ($res= mysqli_fetch_array($sql)){
            $curl1=$res['url'];
            $cname1=$res['Petname'];
        }
        $liked=$result['LikedCat2'];
        $qu= "SELECT Petname, url FROM cats WHERE ind= '$liked';";
        $sql = mysqli_query($con, $qu)or die(mysqli_error($con));
        if ($res =mysqli_fetch_array($sql)){
            $curl2=$res['url'];
            $cname2=$res['Petname'];
        }
        $liked=$result['LikedCat3'];
        $qu= "SELECT Petname, url FROM cats WHERE ind= '$liked';";
        $sql = mysqli_query($con, $qu)or die(mysqli_error($con));
        if ($res =mysqli_fetch_array($sql)){
            $curl3=$res['url'];
            $cname3=$res['Petname'];
        }

    }
?>
<!DOCTYPE html>
<html class="no-js">
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
<title>Snoutscout</title>
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
<div class="text-strip" class="green">
<div class="wrapper">

<div class="container">



<div id="login-form">
<form method="post" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" autocomplete="off">

<div class="col-md-12">

<div class="form-group">
</div>
</br>

<div class="form-group">

</div>

<?php
    if ( isset($errMSG) ) {
        
        ?>
<div class="form-group">
<div class="alert alert-danger">
<span class="glyphicon glyphicon-info-sign"></span> <?php echo $errMSG; ?>
</div>
</div>
<?php
    }
    ?>
<img class="logo-image" srcset="img/logos/ss_logo3.png" alt="" />
<blockquote>Welcome, <?php echo $logged; ?>!</blockquote>
<font size="+2"><b>Liked Dogs:</b> </font>
<ul>
<a href = <?php echo $durl1; ?>><li><?php echo $dname1; ?></li></a>
<a href = <?php echo $durl2; ?>><li><?php echo $dname2; ?></li></a>
<a href = <?php echo $durl3; ?>><li><?php echo $dname3; ?></li></a>
</ul>
</div>
<font size="+2"><b>Liked Cats:</b> </font>
<ul>
<a href = <?php echo $curl1; ?>><li><?php echo $cname1; ?></li></a>
<a href = <?php echo $curl2; ?>><li><?php echo $cname2; ?></li></a>
<a href = <?php echo $curl3; ?>><li><?php echo $cname3; ?></li></a>
</ul>
</div>

</div>

</div>

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

			