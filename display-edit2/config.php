<?php
$host_name = "localhost";
$database = "test"; // Change your database name
$username = "zellis1";          // Your database user id 
$password = "duG9osd1t3Uy1";          // Your database password


//////// Do not Edit below /////////
try {
$dbo = new PDO('mysql:host='.$host_name.';dbname='.$database, $username, $password);
} catch (PDOException $e) {
print "Error!: " . $e->getMessage() . "<br/>";
die();
}
?>