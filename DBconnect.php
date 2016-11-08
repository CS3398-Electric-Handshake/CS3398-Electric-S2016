 <?php
$servername = "localhost";
$username = "root";
$password = "123";

// Create connection
$conn = new mysqli($servername, $username, $password);
    mysqli_select_db($conn, "test1");

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

?> 
