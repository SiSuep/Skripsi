<?php
/**
 * using mysqli_connect for database connection
 */

$databaseHost = 'localhost';
$databaseName = 'satukopi';
$databaseUsername = 'root';
$databasePassword = '';

$koneksi = mysqli_connect($databaseHost, $databaseUsername, $databasePassword, $databaseName); 

?>