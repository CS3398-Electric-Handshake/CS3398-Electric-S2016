 <?php
$servername = "localhost";
$username = "root";
$password = "123";

// Create connection
$con = new mysqli($servername, $username, $password);
    mysqli_select_db($con, "pets");

// Check connection
if ($con->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

?> 
