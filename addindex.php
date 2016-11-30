<?php
    session_start();
    
    require_once 'DBconnect.php';
    $ID = $_SESSION['email'];
    $ind=$_SESSION['ind'];
    $qu= "SELECT LikedDog1, LikedDog2, LikedDog3, LikedCat1, LikedCat2, LikedCat3 FROM user WHERE email= '$ID'";
    $sql = mysqli_query($conn, $qu)or die(mysqli_error($conn));
    
    if ($_SESSION['choice']=="dogs"){
        if ($result = mysqli_fetch_array($sql)) {
            if ($result['LikedDog1'] == NULL){
                $query = "UPDATE user SET LikedDog1= '$ind' WHERE email= '$ID'" or die;
                mysqli_query($conn, $query);
                header ("Location:dogs.php");
            }
            else if ($result['LikedDog2'] == NULL){
                    $query = "UPDATE user SET LikedDog2= '$ind' WHERE email= '$ID'" or die;
                    mysqli_query($conn, $query);
                    header ("Location:dogs.php");
            }
            else if ($result['LikedDog3'] == NULL){
                    $query = "UPDATE user SET LikedDog3= '$ind' WHERE email= '$ID'" or die;
                    mysqli_query($conn, $query);
                    header ("Location:dogs.php");
            }
            else {
                    $query = "UPDATE user SET LikedDog1= LikedDog2 WHERE email= '$ID'" or die;
                    mysqli_query($conn, $query);
                    $query = "UPDATE user SET LikedDog2= LikedDog3 WHERE email= '$ID'" or die;
                    mysqli_query($conn, $query);
                    $query = "UPDATE user SET LikedDog3= '$ind' WHERE email= '$ID'" or die;
                    mysqli_query($conn, $query);
                    header ("Location:dogs.php");
            }
        }
    }
    else if ($_SESSION['choice']=="cats"){
        if ($result = mysqli_fetch_array($sql)) {
            if ($result['LikedCat1'] == NULL){
                $query = "UPDATE user SET LikedCat1= '$ind' WHERE email= '$ID'" or die;
                mysqli_query($conn, $query);
                header ("Location:cats.php");
            }
            else if ($result['LikedCat2'] == NULL){
                $query = "UPDATE user SET LikedCat2= '$ind' WHERE email= '$ID'" or die;
                mysqli_query($conn, $query);
                header ("Location:cats.php");
            }
            else if ($result['LikedCat3'] == NULL){
                $query = "UPDATE user SET LikedCat3= '$ind' WHERE email= '$ID'" or die;
                mysqli_query($conn, $query);
                header ("Location:cats.php");
            }
            else {
                $query = "UPDATE user SET LikedCat1= LikedCat2 WHERE email= '$ID'" or die;
                mysqli_query($conn, $query);
                $query = "UPDATE user SET LikedCat2= LikedCat3 WHERE email= '$ID'" or die;
                mysqli_query($conn, $query);
                $query = "UPDATE user SET LikedCat3= '$ind' WHERE email= '$ID'" or die;
                mysqli_query($conn, $query);
                header ("Location:cats.php");
            }
        }
    }

?>
