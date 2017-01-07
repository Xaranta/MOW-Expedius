<?php
$server = 'localhost';
$username = 'zellis1';
$password = 'duG9osd1t3Uy1';
$database = 'zellis1';

try{
	$conn = new PDO("mysql:host=$server;dbname=$database;", $username, $password);
} catch(PDOException $e){
	die( "Connection failed: " . $e->getMessage());
}