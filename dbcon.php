<?php
$servername = "localhost";
$username = "root";
$password = "";
$db = "ngo";

$conn = new mysqli($servername, $username, $password, $db);

if($conn->connect_error){
    die("Connection failed: ".$conn->connect_error);
}

$sql = "use lib";
if($conn->query($sql) == TRUE) {
} else {
    echo "<br>Error accessing database lib".$conn->error;
}
?>
