<?php
session_start();
$id = $_POST["item_id"];
$servername = "localhost";
$username ="student31";
$password = "bottle14";
$dbname = "student31";
$conn = mysqli_connect($servername, $username, $password, $dbname);
// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

// sql to delete a record

$sql = "DELETE FROM cartitems WHERE itemId = $id"; 

if (mysqli_query($conn, $sql)) {
    mysqli_close($conn);
    header('Location: viewCart.php'); 
    exit;
} else {
    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
}
?>